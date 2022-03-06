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
            'name' => ['required', 'max:25'],
            'year' => 'max:4',
            'make' => 'max:20',
            'model' => 'max:20',
            'mileage' => 'max:7',
            'department_id' => '',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // dd(Auth::user()->company->name);

        $imageName = time().'.'.$request->file('img')->getClientOriginalName();

        $companyFolder = str_replace(' ', '_', Auth::user()->company->name);

        $path = 'images/'.$companyFolder.'/';

        $attributes['company_id'] = Auth::user()->company_id;
        $attributes['main_photo'] = $path.$imageName;
     
        $request->file('img')->move($path, $imageName);

        $newTruck = Truck::create($attributes);
        Image::create([
            'url' => $path.$imageName,
            'truck_id' => $newTruck->id,
        ]);

        return redirect('/fleet');
        // return $attributes;
        // dd($attributes);
    }
}
