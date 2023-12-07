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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoggedIn;
use App\Models\ElectricTransactionDetail;
use App\Models\ProductVariant;
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

// Location
Route::GET('/profile/location', [LocationController::class, 'location'])->middleware('auth')->name('location');
Route::POST('/profile/location', [LocationController::class, 'updateLocation'])->middleware('auth');
ROUTE::DELETE('/profile/location', [LocationController::class, 'deleteLocation'])->middleware('auth');

// Products
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::GET('/search-page/{keyword}', [ProductController::class, 'search'])->name('search');
Route::POST('/product', [ProductController::class, 'store']);
Route::DELETE('/product/{id}', [ProductController::class, 'destroy']);

// Carts
Route::GET('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::POST('/cart', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('auth');
Route::PATCH('/cart', [CartController::class, 'updateCart'])->name('update-cart')->middleware('auth');
Route::DELETE('/cart', [CartController::class, 'deleteCart'])->name('delete-cart')->middleware('auth');
Route::GET('/cart/shipment', [CartController::class, 'shipment'])->name('shipment')->middleware('auth', 'auth.location');

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Merchant
Route::GET('/merchant', [MerchantController::class, 'index'])->middleware('auth')->name('merchant-dashboard');
Route::GET('/merchant/create', [MerchantController::class, 'create'])->middleware('auth')->name('merchant-create');
Route::GET('/merchant/chat', [MerchantController::class, 'chat'])->middleware('auth')->name('merchant-chat');
Route::GET('/merchant/add-product', [MerchantController::class, 'addProduct'])->middleware('auth')->name('merchant-add-product');
Route::GET('/merchant/manage-product', [MerchantController::class, 'manageProduct'])->middleware('auth')->name('merchant-manage-product');
Route::POST('/merchant', [MerchantController::class, 'store'])->middleware('auth');
Route::GET('/merchant/{id}', [MerchantController::class, 'homepage'])->middleware('auth')->name('merchant-homepage');

// Product Variant
Route::DELETE('/product-variant/{id}', [ProductVariantController::class, 'destroy'])->middleware('auth');
Route::GET('/merchant/{id}/products', [MerchantController::class, 'merchantProduct'])->name('merchant-product');

// Chat
Route::GET('/chat', [ChatController::class, 'index'])->middleware('auth')->name('chat');
Route::GET('/chat/{id}', [ChatController::class, 'index'])->middleware('auth');

// Transaction
Route::POST('/transaction', [TransactionDetailController::class, 'addTransaction']);
Route::GET('/profile/transaction', [TransactionDetailController::class, 'index'])->middleware('auth')->name('transaction');
Route::PATCH('/transaction/complete-order', [TransactionDetailController::class, 'completeOrder'])->middleware('auth');
Route::PATCH('/transaction/reject-order', [TransactionDetailController::class, 'rejectOrder'])->middleware('auth');
Route::PATCH('/transaction/shipment-done', [TransactionDetailController::class, 'shipmentDone'])->middleware('auth');
Route::POST('/transaction/electricity', [ElectricTransactionDetailController::class, 'electricOrder'])->middleware('auth');
