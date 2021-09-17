
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
//Front end

//authentication

Route::get('user/auth', [IndexController::class, 'userAuth'])->name('user.auth');
Route::post('user/login', [IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [IndexController::class, 'registerSubmit'])->name('register.submit');

Route::get('user/logout', [IndexController::class, 'userLogout'])->name('user.logout');

Route::get('user/reg', [IndexController::class, 'userRegister'])->name('user.register');

Route::get('/',[IndexController::class,'home'])->name('home');

Route::get('product-category/{slug}/',[IndexController::class,'productCategory'])->name('product.category');

Route::get('product-detail/{slug}',[IndexController::class, 'productDetail'])->name('product.detail');
Route::post('product-review/{slug}', [ProductReviewController::class, 'productReview'])->name('product.review');

//Cart Section

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart/store', [CartController::class, 'cartStore'])->name('cart.store');
Route::post('cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');


///coupon Section

Route::post('coupon/add', [CartController::class, 'couponAdd'])->name('coupon.add');


//wishlist Section

Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::post('wishlist/store', [WishlistController::class, 'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete', [WishlistController::class, 'delete'])->name('wishlist.delete');


//Checkout section

Route::get('checkout1', [CheckoutController::class, 'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout-first', [CheckoutController::class, 'checkout1Store'])->name('checkout1.store');
Route::get('complete/{order}', [CheckoutController::class, 'complete'])->name('complete');



//Shop Section

Route::get('shop', [IndexController::class, 'shop'])->name('shop');
Route::post('shop-filter', [IndexController::class, 'shopFilter'])->name('shop.filter');


//Search Section

Route::get('autosearch' , [IndexController::class, 'autoSearch'])->name('autosearch');
Route::get('search' , [IndexController::class, 'Search'])->name('search');




//End Frontend Section




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
//User Dashboard Routes

Route::group(['prefix' => 'user'], function(){
    Route::get('/dashboard', [IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order', [IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address', [IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account', [IndexController::class,'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}', [IndexController::class, 'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}', [IndexController::class, 'shippingAddress'])->name('shipping.address');

    Route::post('/update/account/{id}', [IndexController::class, 'updateAccount'])->name('update.account');
});