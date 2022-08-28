<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Company;
use App\Models\ServiceEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class EditTruckController extends Controller
{
    public function getEditForm($truckId) {

        $truck = Truck::find($truckId);
            if (Auth::user()->companyId != $truck->companyId) {

                abort(403);
            } else {

                $departments = Auth::user()->company->departments;
                return view('edit_truck', [
                        'truck' => $truck,
                        'departments' => $departments,
                ]);

            };
    }

    public function saveEdit(Request $request, $truckId) {
        // validate form data, select only changed attributes, update record

        $truck = Truck::find($truckId);
        $message = '';

        if (Auth::user()->company_id != $truck->company_id) {

            abort(403);
        } else {

            try {
                $attributes = $request->validate($this->updateRules($request, $truck));
            } catch (exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

            // put each request attribute into the collection
            // remove token from $data
            $data = $request->collect();

            $data = $data->slice(1);

            // only update record with new attributes and update message
            foreach ($data as $key => $value) {

                if ($value != $truck[$key] && $value != '') {

                    $truck[$key] = $value;
                    $message .= 'Successfully updated: '.$key.'<br>';
                }
            }

            try {
                $truck->save();
            } catch (exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
            

            $_SESSION['message'] = $message;
            $departments = Auth::user()->company->departments;

            return view('edit_truck', [
                'truck' => $truck,
                'departments' => $departments,
            ]);
        }
    }

    public function updateRules($request, $truck) {
        // validation rules, ignore name attribute if name is unchanged
        // there seems to be a way of doing this using FormRequest...
        
        if ($request->name == $truck->name) {
            return [
                'year' => ['max:4', 'nullable'],
                'make' => ['max:20', 'nullable'],
                'model' => ['max:20', 'nullable'],
                'mileage' => ['max:7', 'nullable'],
                'department_id' => '',
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
        } else {
            return [

                'name' => ['required', 'max:25',
                Rule::unique('trucks')
                ->where(fn ($query) => $query
                    ->where('company_id', '=', Auth::user()->company_id))
                ],

                'year' => ['max:4', 'nullable'],
                'make' => ['max:20', 'nullable'],
                'model' => ['max:20', 'nullable'],
                'mileage' => ['max:7', 'nullable'],
                'department_id' => '',
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
        }
    }
}
