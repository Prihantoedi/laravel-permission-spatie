<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [UserController::class, "index"])->name("home.page");
Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login-attempt', [LoginController::class, "login_attempt"])->name("login.attempt");
Route::get('logout', [LoginController::class, "logout_account"])->name("logout");

Route::group(["middleware" => ["auth"]], function(){
    Route::get('/private', [UserController::class, "private_page"])->name("private.page");
});

// Route::get('/')

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
