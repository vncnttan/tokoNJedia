<?php

use App\Events\NewChatMessage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
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

Route::GET("/login", [AuthController::class, "loginPage"]);
Route::GET("/register", [AuthController::class, "registerPage"]);
Route::POST("/login", [AuthController::class, "login"]);
Route::POST("/register", [AuthController::class, "register"]);
Route::GET("/logout", [AuthController::class, "logout"]);

// Profile
Route::GET("/profile", function(){
    return view('pages.profile.profile-page-biodata');
});
Route::MATCH(["POST", "PUT"],"/profile/username", [UserController::class, 'updateUsername']);
Route::MATCH(["POST", "PUT"], "/profile/dob", [UserController::class, 'updateDob']);
Route::POST("/profile/image", [UserController::class, 'updateImage']);

// Location
Route::GET('/profile/location', [LocationController::class, 'location']);
Route::POST('/profile/location', [LocationController::class, 'updateLocation']);
ROUTE::DELETE('/profile/location', [LocationController::class, 'deleteLocation']);

// Products
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::GET('/search-page/{keyword}', [ProductController::class, 'search']);
Route::POST('/product', [ProductController::class, 'store']);
Route::DELETE('/product/{id}', [ProductController::class, 'destroy']);

// Carts
Route::GET('/cart', [CartController::class, 'index']);
Route::POST('/cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::PATCH('/cart', [CartController::class, 'updateCart'])->name('update-cart');
Route::DELETE('/cart', [CartController::class, 'deleteCart'])->name('delete-cart');
Route::GET('/cart/shipment', [CartController::class, 'shipment']);

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Merchant
Route::GET('/merchant', [MerchantController::class, 'index']);
Route::GET('/merchant/create', [MerchantController::class, 'create']);
Route::GET('/merchant/chat', [MerchantController::class, 'chat']);
Route::GET('/merchant/add-product', [MerchantController::class, 'addProduct']);
Route::GET('/merchant/manage-product', [MerchantController::class, 'manageProduct']);
Route::POST('/merchant', [MerchantController::class, 'store']);
Route::GET('/merchant/{id}', [MerchantController::class, 'homepage']);

// Product Variant
Route::DELETE('/product-variant/{id}', [ProductVariantController::class, 'destroy']);
Route::GET('/merchant/{id}/products', [MerchantController::class, 'merchantProduct']);

// Chat
Route::GET('/chat', [ChatController::class, 'index']);
// Transaction
Route::POST('/transaction', [TransactionDetailController::class, 'addTransaction']);
Route::GET('/profile/transaction', [TransactionDetailController::class, 'index']);
