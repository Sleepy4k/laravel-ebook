<?php

use App\Http\Controllers\Api;
use App\Http\Controllers\Api\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
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

Route::any('/', [Api\LandingController::class, 'index'])->name('landing.index');
Route::resource('developer', Api\HomeController::class, ['only' => ['index']]);

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
    Route::resource('login', Auth\LoginController::class, ['only' => ['store']]);
    Route::resource('register', Auth\RegisterController::class, ['only' => ['store']]);
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

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('logout', Auth\LogoutController::class, ['only' => ['store']]);
    Route::resource('audit', Api\AuditController::class, ['only' => ['index', 'show']]);
    Route::resource('book', Api\BookController::class, ['except' => ['create', 'edit']]);
    Route::resource('author', Api\AuthorController::class, ['except' => ['create', 'edit']]);
    Route::resource('student', Api\StudentController::class, ['except' => ['create', 'edit']]);
    Route::resource('publisher', Api\PublisherController::class, ['except' => ['create', 'edit']]);
    Route::resource('category', Api\BookCategoryController::class, ['except' => ['create', 'edit']]);
});

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
| 
| Please don't touch the code below unless you know what you're doing.
| Also keep in mind to put this code at the bottom of the route for any route
| listed below this code will not function or listed properly.
*/

Route::any('{links}', [Api\FallbackController::class, 'index'])->name('fallback')->where('links', '.*');