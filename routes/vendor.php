<?php

use App\Http\Controllers\VendorController;
use App\Http\Controllers\Auth\Vendor\AuthController;

Route::group(['prefix'=>'vendor'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('vendor.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('vendor.login');
});

//vendor dashboard

Route::group(['prefix' => 'vendor', 'middleware'=> ['vendor']], function(){
    Route::get('/', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});