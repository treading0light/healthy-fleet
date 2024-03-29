<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Image;
use App\Models\Company;
use App\Models\Service;
use App\Http\Controllers\AddTruckController;
use App\Http\Controllers\AddImageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\FleetViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditTruckController;
use App\Http\Controllers\DemoController;

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

Route::get('/home', [HomeController::class, 'render'])->middleware(['auth'])->name('home');

Route::get('/fleet/{truckId?}', [FleetViewController::class, 'render'])->middleware(['auth'])
->name('fleet');

Route::get('/fleet/edit/{truckId}', [EditTruckController::class, 'getEditForm'])
->middleware(['auth'])
->name('editTruck');

Route::post('/fleet/edit/{truckId}', [EditTruckController::class, 'saveEdit'])
->middleware(['auth']);

Route::post('/fleet/delete/{truckId}', [EditTruckController::class, 'deleteTruck'])
->middleware(['auth']);

Route::get('/add_images/{truck:name}', function (Truck $truck) {
    return view('add_images', [
        'truck' => $truck,
        'images' => $truck->images(),
    ]);
})->middleware(['auth'])->name('add_images');

Route::post('/add_images/{truck:name}', [AddImageController::class, 'imageUploadPost'
])->name('add.images.post')->middleware(['auth']);

Route::get('/setup', [SetupController::class, 'getSetup'
])->middleware(['auth']);

Route::post('/setup', [SetupController::class, 'storeSetup'
])->middleware(['auth']);

Route::get('/setup/truck', [SetupController::class, 'getTruckForm'])->middleware(['auth'])->name('setup_truck');

Route::post('/setup/truck', [SetupController::class, 'storeTruck']);

Route::get('/create_service/{truckId}', [ServiceController::class, 'newServiceForm']
)->middleware(['auth'])->name('create_service');

Route::post('/create_service', [ServiceController::class, 'storeService'])->middleware(['auth']);

Route::get('/update_service/{serviceId}', [ServiceController::class, 'updateServiceForm']
)->middleware(['auth']);

Route::post('/update_service/{serviceId}', [ServiceController::class, 'updateService']
)->middleware(['auth']);

Route::get('/demo', [DemoController::class, 'create']);

require __DIR__.'/auth.php';
