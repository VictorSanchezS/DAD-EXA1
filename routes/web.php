<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vehicles',VehicleController::class);
Route::resource('entries', EntryController::class);
