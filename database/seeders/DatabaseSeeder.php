<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck;
use App\Models\Department;
use App\Models\User;
use App\Models\Company;
use App\Modles\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Department::truncate();
        Truck::truncate();
        Company::truncate();
        // \App\Models\User::factory(10)->create();

        $company1 = Company::create([
            'name' => 'valentine roofing',
        ]);

        $company2 = Company::create([
            'name' => 'trimark',
        ]);

        $user1 = User::create([
            'name' => 'tony',
            'email' => 'something@else.com',
            'password' => bcrypt('11password'),
            'company_id' => $company1->id
        ]);

        $user2 = User::create([
            'name' => 'kya',
            'email' => 'kya@email.com',
            'password' => bcrypt('12password'),
            'company_id' => $company2->id
        ]);

        $dep1 = Department::create([
            'name' => 'windows',
            'company_id' => 1
        ]);

        $dep2 = Department::create([
            'name' => 'gutters',
            'company_id' => 1
        ]);

        $dep3 = Department::create([
            'name' => 'roofing',
            'company_id' => 1
        ]);

        $dep4 = Department::create([
            'name' => 'justice',
            'company_id' => 2
        ]);

        


        // Truck::create([
        //     'name' => 'truck-01',
        //     'year' => 2008,
        //     'make' => 'ford',
        //     'model' => 'f350',
        //     'mileage' => 131697,
        //     'department-id' => $dep1->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'truck-02',
        //     'year' => 2005,
        //     'make' => 'ford',
        //     'model' => 'f350',
        //     'mileage' => 101222,
        //     'department-id' => $dep1->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'truck-03',
        //     'year' => 2016,
        //     'make' => 'toyota',
        //     'model' => 'tacoma',
        //     'mileage' => 21697,
        //     'department-id' => $dep2->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'truck-04',
        //     'year' => 2001,
        //     'make' => 'ford',
        //     'model' => 'f150',
        //     'mileage' => 141697,
        //     'department-id' => $dep2->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'truck-05',
        //     'year' => 2016,
        //     'make' => 'chevy',
        //     'model' => '2500',
        //     'mileage' => 65900,
        //     'department-id' => $dep3->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'truck-06',
        //     'year' => 2014,
        //     'make' => 'toyota',
        //     'model' => 'tundra',
        //     'mileage' => 98024,
        //     'department-id' => $dep3->id,
        //     'user-id' => $user1->id,
        // ]);

        // Truck::create([
        //     'name' => 'car-1',
        //     'year' => 2016,
        //     'make' => 'hyundai',
        //     'model' => 'elantra',
        //     'mileage' => 90455,
        //     'user-id' => $user2->id,
        // ]);

    }
}
