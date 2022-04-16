<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use App\Models\Truck;
use App\Models\Company;
use App\Models\Image;
use App\Models\Department;

class setupController extends Controller {

    public function getTruckForm() {

        return view('setup_truck', [
                'departments' => Company::find(Auth::user()->company_id)->departments
            ]);
    }

    public function storeTruck(Request $request) {
        // add new vehicle to the database from form data

        try {
            $attributes = $request->validate([

                'name' => ['required', 'max:25',
                Rule::unique('trucks')->where(fn ($query) => $query->where('company_id', '=', Auth::user()->company_id))],

                'year' => ['max:4', 'nullable'],
                'make' => ['max:20', 'nullable'],
                'model' => ['max:20', 'nullable'],
                'mileage' => ['max:7', 'nullable'],
                'department_id' => '',
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        } catch (exception $e) {
            return view('setup_truck')->withError($e->getMessage());
        }

        $attributes['company_id'] = Auth::user()->company_id;

        $newTruck = Truck::create($attributes);

        if ($request->file('img')) {
            $this->addMainPhoto($request, $newTruck);
        };

        $message = 'Success! Vehicle added to the fleet.';

        $_SESSION['message'] = $message;

        return view('setup_truck', [
                'departments' => Company::find(Auth::user()->company_id)->departments
            ]);

    }

    public function addMainPhoto(Request $request, $newTruck) {
        // if storeTruck() is given an img file, save image to server
        // and save path to vehicle

        $imageName = time().'.'.$request->file('img')->getClientOriginalName();

        $companyFolder = str_replace(' ', '_', Auth::user()->company->name);

        $path = 'images/'.$companyFolder.'/';

        $request->file('img')->move($path, $imageName);

        $image = Image::create([
            'url' => $path.$imageName,
            'truck_id' => $newTruck->id,
        ]);

        $newTruck->update(['main_photo' => $image->url]);
    }

    public function makeCompanyFolder($companyName) {
        // create a folder to hold images named after user's company

        $companyFolder = str_replace(' ', '_', Auth::user()->company->name);

        $path = public_path('images/'.$companyFolder.'/');

        // check if company folder already exists,
        // make one if not
        if(!File::isDirectory($path)){

            File::makeDirectory($path, 0777, true, true);
        };
    }

    public function getSetup() {

        if (Auth::user()->company) {
            return redirect('/setup/truck');
        } else {
            return view('setup');
        }
    }
    

    public function storeSetup(Request $request) {
        // set company name and define department names

        // validate request
        try {
            $attributes = $request->validate([
                    'company_name' => ['required', 'max:50', 'unique:companies,name'],
                    'department_name' => ['max:25', 'nullable']
            ]);
        } catch (exception $e) {
            return view(url('/setup'))->withErrors($e);
        };

        // create new company in DB
        $company = Company::create([
                'name' => $attributes['company_name'],
        ]);

        // create new department if single string or array

        foreach ($attributes['department_name'] as $name) {
            if (is_null($name)) {
                Department::create([
                'name' => 'None',
                'company_id' => $company->id,
                ]);
            } else {
                Department::create([
                'name' => $name,
                'company_id' => $company->id,
                ]);
            };        
        };

        // assign company id to user
        Auth::user()->update(['company_id' => $company->id]);

        // make a folder to hold images
        $this->makeCompanyFolder($company->name); 

        // send user to next setup step
        return redirect(url('/setup/truck'));
    }


}
