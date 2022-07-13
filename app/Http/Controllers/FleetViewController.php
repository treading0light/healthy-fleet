<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Company;
use App\Models\ServiceEvent;
use Illuminate\Support\Facades\Auth;

class FleetViewController extends Controller
{
    public function render($truckId=null) {
        // if truckId is included in request, return single unit view
        // else return fleet overview

        if ($truckId) {

            // get truck that matches request id
            $truck = Truck::find($truckId);


            // abort if user does not match requested data
            if ($truck->company_id != Auth::user()->company_id) {

                abort(403);
            } else {

                $services = $truck->services;

                if ($services->isNotEmpty()) {

                    foreach ($services as $service) {

                    // calculate miles remaining until service due
                    $mileage = $service->mileage_due - $truck->mileage;

                    // create assoc to be ordered by mileage
                    $orderedServices[$mileage] = $service;
                    }

                    // sort services
                    
                    ksort($orderedServices);

                    return view('truck', [
                    'truck' => $truck,
                    'services' => $orderedServices,
                    ]);

                } else {

                    return view('truck', [
                        'truck' => $truck,
                    ]);
                }
            }
            
            
        } else {
            // return fleet overview

            $trucks = Truck::oldest('name')
            ->where('company_id', '=', Auth::user()->company_id)
            ->with('department')
            ->get();


            foreach ($trucks as $truck) {

                $orderedServices = [];

                if ($truck->services->isNotEmpty()) {

                    foreach ($truck->services as $service) {

                    // calculate miles remaining until service due
                    $mileage = $service->mileage_due - $truck->mileage;

                    // create array to be ordered by mileage
                    $orderedServices[] = $mileage;
                    }

                    // sort services
                    
                    sort($orderedServices);

                    $nextService[$truck->id] = $orderedServices[0];

                } else {
                    $nextService[$truck->id] = 'Zero';
                }                          
            }


            return view('fleet', [
                'trucks' => $trucks,
                'nextService' => $nextService,
            ]);
        }
    }
}
