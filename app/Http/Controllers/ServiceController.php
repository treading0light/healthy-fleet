<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function newServiceForm($truckId) {

        $truck = Truck::select('name', 'id', 'mileage')->where('id', $truckId)->first();

        // dd($truck);

        return view('service_form', [
        'truck' => $truck,
        'form_action' => '/create_service'
        ]);
    }

    public function updateServiceForm($serviceId) {
        $service = Service::find($serviceId);
        $truck = Truck::select('name', 'id', 'mileage')->where('id', $service->truck_id)->first();
        $formAction = '/update_service/'.$serviceId;

        return view('service_form', [
            'service' => $service,
            'truck' => $truck,
            'form_action' => $formAction
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

    public function updateService(Request $request, $serviceId) {
        $service = Service::find($serviceId);
        $truck = Truck::find($service->truck_id);
        $message = '';

        if (Auth::user()->company_id != $service->company_id) {

            abort(403);
        } else {
            try {
                $attributes = $request->validate([
                    'name' => ['max:25', 'nullable'],
                    'frequency' => ['max:25', 'nullable'],
                    'mileage_repeat' => ['nullable'],
                    'mileage_due' => ['max:6', 'nullable'],
                    'truck_id' => ['nullable'],
                    'description' => ['nullable']
                ]);
            } catch (exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

             // put each request attribute into the collection
            // remove token from $data
            $data = $request->collect();

            $data = $data->slice(1);

            $data['mileage_due'] = $data['mileage_due'] + $truck->mileage;

            // only update record with new attributes and update message
            foreach ($data as $key => $value) {

                if ($value != $service[$key] && $value != '') {

                    $service[$key] = $value;
                    $message .= 'Successfully updated: '.$key.'<br>';
                }


            }

            // save changes
            try {
                $service->save();
            } catch (exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

            $_SESSION['message'] = $message;

            return $this->updateServiceForm($serviceId);
        }
    }

}
