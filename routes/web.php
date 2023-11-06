<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
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

Route::GET("/profile", function(){
    return view('pages.profile.profile');
});


Route::get('/', function () {
    return view('pages.home.home');
})->name('home');

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


