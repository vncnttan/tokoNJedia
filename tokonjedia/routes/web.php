<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('pages.home.home');
});
