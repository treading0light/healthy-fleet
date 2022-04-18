<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class FleetViewController extends Controller
{
    public function render($slug=null) {

        if ($slug) {
            dd($slug);

            return view('truck', [
            'truck' => Truck::where('name', '=', $slug)
            ->where('company_id', '=', Auth::user()->company_id)
            ->with('department')
            ->get(),
            ]);

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
