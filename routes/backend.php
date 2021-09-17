<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
//Admin login
Route::group(['prefix'=>'admin'], function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('admin.login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});

//Admin Dashboard


Route::group(['prefix' => 'admin/', 'middleware'=> ['admin']], function(){
    Route::get('/', [AdminController::class, 'admin'])->name('admin');


    //Banner Section

    Route::resource('/banner', BannerController::class);
    Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');

    //Category Section

    Route::resource('/category', CategoryController::class);
    Route::post('category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');


    Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);
    //Brand Section
    
    Route::resource('/brand', BrandController::class);
    Route::post('brand_status', [BrandController::class, 'brandStatus'])->name('brand.status');
    
    //Product Section
    
    Route::resource('/product', ProductController::class);
    Route::post('product_status', [ProductController::class, 'productStatus'])->name('product.status');

    //Product Attribute

    Route::post('product-attribute/{id}', [ProductController::class, 'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}', [ProductController::class, 'productAttributeDelete'])->name('product.attribute.destroy');
    
    //User Section
    
    Route::resource('/user', UserController::class);
    Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');
    
    //Coupon Section

    Route::resource('coupon', CouponController::class);
    Route::post('coupon_status', [CouponController::class, 'couponStatus'])->name('coupon.status');
    
    //Shipping Section

    Route::resource('shipping',ShippingController::class);
    Route::post('shipping_status', [ShippingController::class, 'shippingStatus'])->name('shipping.status');
    
    //Currency Section

    Route::resource('currency',CurrencyController::class);
    Route::post('currency_status', [CurrencyController::class, 'currencyStatus'])->name('currency.status');
    //Order Section

    Route::resource('order', OrderController::class);
    Route::post('order-status', [OrderController::class, 'orderStatus'])->name('order.status');

    //settings section
    Route::get('settings', [SettingController::class, 'settings'])->name('settings');
    Route::put('settings', [SettingController::class, 'settingsUpdate'])->name('setting.update');

    //SELLER Section
    Route::resource('seller', SellerController::class);
    Route::post('seller-status', [SellerController::class, 'sellerStatus'])->name('seller.status');
    Route::post('seller-verified', [SellerController::class, 'sellerVerified'])->name('seller.verified');
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});