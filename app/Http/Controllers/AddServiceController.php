<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AddServiceController extends Controller
{
    public function getServiceForm($truck) {

        return view('create_service', [
        'truck' => $truck,
        ]);
    }

    public function storeService(Request $request) {

        try {
            $attributes = $request->validate([

                'name' => ['required', 'max:25'],
                'frequency' => ['max:25'],
                'mileage_repeat' => '',
                'mileage_due' => 'max:6',
                'truck_id' => '',
                'description' => ''

            ]);
        } catch (exception $e) {
            return view('create_service')->withError($e->getMessage());
        }

        $truck = Truck::find($attributes['truck_id']);

        $attributes['mileage_due'] = $attributes['mileage_due'] + $truck->mileage;

        $attributes['company_id'] = Auth::user()->company_id;

        $newService = Service::create($attributes);

        // dd($attributes);

        return redirect(url('fleet/'.$truck->id));
    }
}
