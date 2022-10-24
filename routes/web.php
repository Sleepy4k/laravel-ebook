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
    Route::resource('dashboard', Web\DashboardController::class, ['only' => ['index']]);
    Route::resource('book', Web\BookController::class);

    Route::prefix('table')->as('table.')->group(function() {
        Route::resource('author', Web\BookController::class);
        Route::resource('student', Web\BookController::class);
        Route::resource('category', Web\BookController::class);
        Route::resource('publisher', Web\BookController::class);
    });

    Route::prefix('admin')->as('admin.')->group(function() {
        Route::resource('user', Web\BookController::class);
        Route::resource('role', Web\BookController::class);
        Route::resource('translate', Web\BookController::class);
        Route::resource('application', Web\BookController::class);
    });

    Route::prefix('audit')->as('audit.')->group(function() {
        Route::resource('auth', Web\BookController::class);
        Route::resource('model', Web\BookController::class);
        Route::resource('query', Web\BookController::class);
        Route::resource('system', Web\BookController::class);
    });

    Route::prefix('profile')->as('profile.')->group(function() {
        Route::resource('account', Web\BookController::class);
        Route::resource('logout', Auth\LogoutController::class, ['only' => ['store']]);
    });
});