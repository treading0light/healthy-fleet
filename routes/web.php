<?php

use Illuminate\Support\Facades\Route;
use App\Models\Truck;
use App\Http\Controllers\AddTruckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fleet', function () {
    return view('fleet',[
        'trucks' => Truck::oldest('name')->with('department')->get()
    ]);
});

Route::get('/fleet/{truck:name}', function (Truck $truck) {
    return view('truck', [
        'truck' => $truck,
    ]);
});

Route::get('/add_truck', function () {
    return view('add_truck');
});

Route::post('/add_truck', [AddTruckController::class, 'store']);
