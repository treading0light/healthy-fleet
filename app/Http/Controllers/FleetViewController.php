<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class FleetViewController extends Controller
{
    public function render($truckId=null) {

        if ($truckId) {

            $truck = Truck::find($truckId);
            // dd($truck);

            if ($truck->company_id == Auth::user()->company_id) {
                // dd($truck);
              return view('truck', [
                'truck' => $truck,
                ]);  
            } else {
                abort(403);
            }

            

        } else {

            return view('fleet', [
                'trucks' => Truck::oldest('name')
                ->where('company_id', '=', Auth::user()->company_id)
                ->with('department')
                ->get()
            ]);
        }
    }
}
