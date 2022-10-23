<?php

use App\Http\Controllers\Web;
use App\Http\Controllers\Web\Auth;
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

Route::any('/', [Web\LandingController::class, 'index'])->name('landing');

Route::middleware('guest')->group(function() {
    Route::resource('login', Auth\LoginController::class, ['only' => ['index', 'store']]);
    Route::resource('register', Auth\RegisterController::class, ['only' => ['index', 'store']]);
});

Route::middleware('auth')->group(function() {
    Route::resource('logout', Auth\LogoutController::class, ['only' => ['store']]);
    
    Route::resource('dashboard', Web\DashboardController::class, ['only' => ['index']]);
    Route::resource('book', Web\BookController::class);
});