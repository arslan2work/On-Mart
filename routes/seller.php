<?php

use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\Seller\AuthController;

Route::group(['prefix'=>'seller'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('seller.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('seller.login');
});

//vendor dashboard

Route::group(['prefix' => 'seller', 'middleware'=> ['seller']], function(){
    Route::get('/', [SellerController::class, 'dashboard'])->name('seller');

    //Seller section

    Route::resource('/seller-product', ProductController::class);
    Route::post('seller_product_status', [ProductController::class, 'sellerProductStatus'])->name('seller.product.status');
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});