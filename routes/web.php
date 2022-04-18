<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Image;
use App\Models\Company;
use App\Http\Controllers\AddTruckController;
use App\Http\Controllers\AddImageController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\FleetViewController;

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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth']);

Route::get('/fleet', function () {
    return view('fleet',[
        'trucks' => Truck::oldest('name')
        ->where('company_id', '=', Auth::user()->company_id)
        ->with('department')
        ->get()
    ]);
})->middleware(['auth']);

// Route::get('/fleet/{slug?}', [FleetViewController::class, 'render'])->middleware(['auth']);

Route::get('/fleet/{truck:name}', function (Truck $truck) {
    return view('truck', [
        'truck' => $truck,
    ]);
})->middleware(['auth']);

Route::get('/add_truck', function () {
    return view('add_truck', [
        'departments' => Company::find(Auth::user()->company_id)->departments
    ]);
})->middleware(['auth']);

Route::post('/add_truck', [AddTruckController::class, 'store'])->middleware(['auth']);

Route::get('/add_images/{truck:name}', function (Truck $truck) {
    return view('add_images', [
        'truck' => $truck,
        'images' => $truck->images(),
    ]);
})->middleware(['auth'])->name('add_images');

Route::post('/add_images/{truck:name}', [AddImageController::class, 'imageUploadPost'
])->name('add.images.post')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/setup', [SetupController::class, 'getSetup'
])->middleware(['auth']);

Route::post('/setup', [SetupController::class, 'storeSetup'
])->middleware(['auth']);

Route::get('/setup/truck', [SetupController::class, 'getTruckForm'])->middleware(['auth'])->name('setup_truck');

Route::post('/setup/truck', [SetupController::class, 'storeTruck']);

require __DIR__.'/auth.php';
