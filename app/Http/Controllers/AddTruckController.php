<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;

class AddTruckController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'max:25'],
            'year' => 'max:4',
            'make' => 'max:20',
            'model' => 'max:20',
            'mileage' => 'max:7',
        ]);

        $attributes['user_id'] = 1;
        $attributes['department_id'] = 1;

        Truck::create($attributes);

        return redirect('/fleet');
        // return $attributes;
    }
}
