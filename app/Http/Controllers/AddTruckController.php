<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Truck;
use App\Models\Company;
use App\Models\Image;

class AddTruckController extends Controller
{
    public function store(Request $request) {
        // dd($request->file('img'));

        $attributes = $request->validate([
            'name' => ['required', 'max:25', Rule::unique('trucks')->where(fn ($query) => $query->where('company_id', Auth::user()->company_id))],
            'year' => ['max:4', 'nullable'],
            'make' => ['max:20', 'nullable'],
            'model' => ['max:20', 'nullable'],
            'mileage' => ['max:7', 'nullable'],
            'department_id' => '',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $attributes['company_id'] = Auth::user()->company_id;
     
        $newTruck = Truck::create($attributes);

        if ($request->file('img')) {
            addMainPhoto($request, $newTruck);
        };

        return redirect('/fleet');
        // return $attributes;
        // dd($attributes);
    }

    public function addMainPhoto(Request $request, $newTruck) {

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
}
