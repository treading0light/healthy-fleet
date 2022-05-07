<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function render() {
        // grab fleet and service data to be rendered in home view

        // get number of trucks in fleet
        $truckCount = Truck::where('company_id', '=', Auth::user()->company_id)->count();

        // get all services in company with their truck
        $services = Service::where('company_id', '=', Auth::user()->company_id)
        ->where('status', '=', 'open')
        ->with('truck')->get();

        // calculate service mileage to get remaining miles until due
        // make assoc array with calculated mileage as key and service collection as value
        foreach ($services as $service) {
            $mileage = $service->mileage_due - $service->truck->mileage;

            $orderedServices[$mileage] = $service;
        }

        // order by miles remaining
        ksort($orderedServices);

        // grab only the first 3 services
        $nextServices = array_slice($orderedServices, 0, 3);


        return view('home', [
            'truckCount' => $truckCount,
            'services' => $nextServices
        ]);

    }
}
