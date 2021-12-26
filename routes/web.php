<?php

use Illuminate\Support\Facades\Route;

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
    return view('fleet');
});

Route::get('/truck', function () {
    return view('truck');
});

Route::get('/add_truck', function () {
    return view('add_truck');
});
