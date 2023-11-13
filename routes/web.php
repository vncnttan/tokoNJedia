<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\UserController;
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
    return view('pages.profile.profile');
});
Route::MATCH(["POST", "PUT"],"/profile/username", [UserController::class, 'updateUsername']);
Route::MATCH(["POST", "PUT"], "/profile/dob", [UserController::class, 'updateDob']);

// Products
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [HomeController::class, 'detail'])->name('detail');

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Merchant
Route::GET('/merchant', [MerchantController::class, 'index']);
Route::GET('/merchant/create', [MerchantController::class, 'create']);

