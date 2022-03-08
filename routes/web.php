<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Image;
use App\Models\Company;
use App\Http\Controllers\AddTruckController;
use App\Http\Controllers\AddImageController;

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
        'trucks' => Truck::oldest('name')->with('department')->get()
    ]);
})->middleware(['auth']);

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

Route::get('/setup', function() {
    return view('setup');
});

require __DIR__.'/auth.php';
