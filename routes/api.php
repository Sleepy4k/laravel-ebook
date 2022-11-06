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

Route::get('/', [Api\LandingController::class, 'index'])->name('landing.index');
Route::apiResource('developer', Api\HomeController::class, ['only' => ['index']]);

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
    Route::apiResource('login', Auth\LoginController::class, ['only' => ['store']]);
    Route::apiResource('register', Auth\RegisterController::class, ['only' => ['store']]);
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
    Route::apiResource('logout', Auth\LogoutController::class, ['only' => ['store']]);
    Route::apiResource('audit', Api\AuditController::class, ['only' => ['index', 'show']]);
    Route::apiResource('book', Api\BookController::class);
    Route::apiResource('author', Api\AuthorController::class);
    Route::apiResource('student', Api\StudentController::class);
    Route::apiResource('publisher', Api\PublisherController::class);
    Route::apiResource('category', Api\BookCategoryController::class);
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