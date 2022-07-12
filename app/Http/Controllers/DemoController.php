<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;
use App\Models\Company;
use App\Models\Image;
use App\Models\Department;
use App\Models\User;
use App\Models\Service;

use Illuminate\Support\Facades\Auth;

class DemoController extends Controller
{
    public function create() {
        $company = $this->makeCompany();

        $user = $this->makeUser($company->id);

        Auth::login($user);

        $departments = $this->makeDepartments($company->id);

        $fleet = $this->makeFleet($departments);

        foreach ($fleet as $truck) {
            $services[] = $this->makeService($truck, $company->id);
        }

        return redirect('/fleet');



    }

    function makeCompany() {

        $ran = (string) random_int(1000, 9999);

        return Company::create([
            'name' => 'demo'.$ran
        ]);
    }

    function makeUser($companyId) {
        $ran = (string) random_int(1000, 9999);

        $properties = [
            'name' => 'user'.$ran,
            'email' => 'user'.$ran.'@gmail.com',
            'status' => 'demo',
            'password' => 'password11',
            'company_id' => $companyId

        ];

        return User::create($properties);
    }

    function makeDepartments($companyId) {
        $departments[] = Department::create([
            'name' => 'department 1',
            'company_id' => $companyId
        ]);

        $departments[] = Department::create([
            'name' => 'department 2',
            'company_id' => $companyId
        ]);

        return $departments;
    }

    function makeFleet($departments) {
        $fleet[] = Truck::create([
            'name' => 'truck 1',
            'year' => 2018,
            'make' => 'Ford',
            'model' => 'f350',
            'mileage' => 80525,
            'department_id' => $departments[0]->id,
            'company_id' => Auth::user()->company_id
        ]);

        $fleet[] = Truck::create([
            'name' => 'truck 2',
            'year' => 2018,
            'make' => 'Ford',
            'model' => 'f350',
            'mileage' => 90255,
            'department_id' => $departments[0]->id,
            'company_id' => Auth::user()->company_id
        ]);

        $fleet[] = Truck::create([
            'name' => 'truck 3',
            'year' => 2018,
            'make' => 'Ford',
            'model' => 'f350',
            'mileage' => 102850,
            'department_id' => $departments[1]->id,
            'company_id' => Auth::user()->company_id
        ]);

        return $fleet;
    }

    function makeService($truck, $companyId) {

            $service = Service::create([
                'name' => 'Oil Change',
                'frequency' => 'once',
                'mileage_due' => rand(200, 2000) + $truck->mileage,
                'truck_id' => $truck->id,
                'company_id' => $companyId,
                'description' => 'regular oil change'
            ]);

        return $service;
    }
}
