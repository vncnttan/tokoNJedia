<?php

use App\Events\NewChatMessage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ElectricTransactionDetailController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantFollowerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
use App\Models\ElectricTransactionDetail;
use App\Models\ProductVariant;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Spatie\Csp\AddCspHeaders;

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

Route::GET("/login", [AuthController::class, "loginPage"])->name('login')->middleware('guest');
Route::GET("/register", [AuthController::class, "registerPage"])->name('register')->middleware('guest');
Route::POST("/login", [AuthController::class, "login"])->middleware('guest');
Route::POST("/register", [AuthController::class, "register"])->middleware('guest');
Route::GET("/logout", [AuthController::class, "logout"])->middleware('auth')->name('logout');

// Profile
Route::GET("/profile", function () {
    return view('pages.profile.profile-page-biodata');
})->middleware('auth')->name('profile');
Route::MATCH(["POST", "PUT"], "/profile/username", [UserController::class, 'updateUsername'])->middleware('auth');
Route::MATCH(["POST", "PUT"], "/profile/dob", [UserController::class, 'updateDob'])->middleware('auth');
Route::POST("/profile/image", [UserController::class, 'updateImage'])->middleware('auth');

// Following
Route::GET('/profile/following', [MerchantFollowerController::class, 'index'])->middleware('auth')->name('following');
Route::POST('/follow', [MerchantFollowerController::class, 'follow'])->middleware('auth');

// Location
Route::GET('/profile/location', [LocationController::class, 'location'])->middleware('auth')->name('location');
Route::POST('/profile/location', [LocationController::class, 'updateLocation'])->middleware('auth');
ROUTE::DELETE('/profile/location', [LocationController::class, 'deleteLocation'])->middleware('auth');

// Products
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [HomeController::class, 'detail'])->middleware('auth.productExists')->name('detail');
Route::GET('/search-page/{keyword}', [ProductController::class, 'search'])->name('search');
Route::POST('/product', [ProductController::class, 'store']);
Route::DELETE('/product/{id}', [ProductController::class, 'destroy'])->middleware('auth.productExists');
Route::get('/lazy-load/{requestCount}', [ProductController::class, 'lazyLoad']);
Route::get('/deals/{promoId}', [ProductController::class, 'deals'])->name('deals');

// Carts
Route::GET('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::POST('/cart', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('auth');
Route::PATCH('/cart', [CartController::class, 'updateCart'])->name('update-cart')->middleware('auth');
Route::DELETE('/cart', [CartController::class, 'deleteCart'])->name('delete-cart')->middleware('auth');
Route::GET('/cart/shipment', [CartController::class, 'shipment'])->name('shipment')->middleware('auth', 'auth.location', 'auth.cart');

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Merchant
Route::GET('/merchant', [MerchantController::class, 'index'])->middleware('auth', 'auth.merchant')->name('merchant-dashboard');
Route::POST('/merchant', [MerchantController::class, 'store'])->middleware('auth');
Route::GET('/merchant/create', [MerchantController::class, 'create'])->middleware('auth', 'auth.customer')->name('merchant-create');
Route::GET('/merchant/chat', [MerchantController::class, 'chat'])->middleware('auth', 'auth.merchant')->name('merchant-chat');
Route::GET('/merchant/add-product', [MerchantController::class, 'addProduct'])->middleware('auth', 'auth.merchant')->name('merchant-add-product');
Route::GET('/merchant/manage-product', [MerchantController::class, 'manageProduct'])->middleware('auth', 'auth.merchant')->name('merchant-manage-product');
Route::GET('/merchant/transactions', [MerchantController::class, 'merchantTransactions'])->middleware('auth', 'auth.merchant')->name('merchant-transaction');
Route::GET('/merchant/profile', [MerchantController::class, 'profile'])->middleware('auth', 'auth.merchant')->name('merchant-profile');
Route::PATCH('/merchant/profile', [MerchantController::class, 'updateProfile'])->middleware('auth', 'auth.merchant');
Route::GET('/merchant/{id}', [MerchantController::class, 'homepage'])->middleware('auth', 'auth.merchantExists')->name('merchant-homepage');

// Product Variant
Route::DELETE('/product-variant/{id}', [ProductVariantController::class, 'destroy'])->middleware('auth');
Route::GET('/merchant/{id}/products', [MerchantController::class, 'merchantProduct'])->name('merchant-product');

// Chat
Route::GET('/chat', [ChatController::class, 'index'])->middleware('auth')->name('chat');
Route::GET('/chat/{id}', [ChatController::class, 'index'])->middleware('auth', 'othersId');

// Transaction
Route::POST('/transaction', [TransactionDetailController::class, 'addTransaction']);
Route::GET('/profile/transaction', [TransactionDetailController::class, 'index'])->middleware('auth')->name('transaction');
Route::PATCH('/transaction/complete-order', [TransactionDetailController::class, 'completeOrder'])->middleware('auth');
Route::PATCH('/transaction/reject-order', [TransactionDetailController::class, 'rejectOrder'])->middleware('auth');
Route::PATCH('/transaction/shipment-done', [TransactionDetailController::class, 'shipmentDone'])->middleware('auth');
Route::POST('/transaction/electricity', [ElectricTransactionDetailController::class, 'electricOrder'])->middleware('auth');

// Review
Route::GET('/review/{transactionId}/{productId}', [ReviewController::class, 'index'])->middleware('auth', 'createReviewMiddleware')->name('review');
Route::POST('/review', [ReviewController::class, 'addReview'])->middleware('auth');
Route::POST('/reply', [ReviewController::class, 'addReply'])->middleware('auth');
