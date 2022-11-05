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

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::any('/', [Web\LandingController::class, 'index'])->name('landing.index');

/*
|--------------------------------------------------------------------------
| Unauthenticated Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are meant
| to be used for guests and are not guarded by any authentication system.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::middleware('guest')->group(function() {
    Route::resource('login', Auth\LoginController::class, ['only' => ['index', 'store']]);
    Route::resource('register', Auth\RegisterController::class, ['only' => ['index', 'store']]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Route
|--------------------------------------------------------------------------
|
| In here you can list any route for authenticated user. These routes
| are meant to be used privately since the access is exclusive to authenticated
| user who had obtained their sanctum token from login API!
*/

Route::middleware('auth')->group(function() {
    Route::resource('book', Web\BookController::class);
    Route::resource('dashboard', Web\DashboardController::class, ['only' => ['index']]);

    Route::prefix('table')->as('table.')->group(function() {
        Route::resource('author', Web\AuthorController::class);
        Route::resource('student', Web\StudentController::class);
        Route::resource('category', Web\BookCategoryController::class);
        Route::resource('publisher', Web\PublisherController::class);
    });

    Route::prefix('admin')->as('admin.')->group(function() {
        Route::resource('user', Web\BookController::class);
        Route::resource('role', Web\BookController::class);
        Route::resource('translate', Web\BookController::class);
        Route::resource('application', Web\BookController::class);
    });

    Route::prefix('audit')->as('audit.')->group(function() {
        Route::resource('auth', Web\AuthController::class, ['only' => ['index']]);
        Route::resource('model', Web\ModelController::class, ['only' => ['index']]);
        Route::resource('query', Web\QueryController::class, ['only' => ['index']]);
        Route::resource('system', Web\SystemController::class, ['only' => ['index']]);
    });

    Route::prefix('profile')->as('profile.')->group(function() {
        Route::resource('account', Web\BookController::class);
        Route::resource('logout', Auth\LogoutController::class, ['only' => ['store']]);
    });
});