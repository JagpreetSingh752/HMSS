<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes will be scaffolded using Breeze in instructions
Route::middleware(['auth'])->group(function(){
    Route::resource('doctors', DoctorController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('bills', BillController::class);
});
