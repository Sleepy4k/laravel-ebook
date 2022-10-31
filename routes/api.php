<?php

use App\Http\Controllers\Api;
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
| UnAuthenticate Route
|--------------------------------------------------------------------------
*/
Route::any('/', [Api\LandingController::class, 'index'])->name('landing.index');
Route::resource('me', Api\HomeController::class, ['only' => ['index']]);
Route::resource('login', Api\Auth\LoginController::class, ['only' => ['store']]);
Route::resource('register', Api\Auth\RegisterController::class, ['only' => ['store']]);

/*
|--------------------------------------------------------------------------
| Authenticate Route
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function() {
    Route::resource('logout', Api\Auth\LogoutController::class, ['only' => ['store']]);
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
*/
Route::fallback([Api\FallbackController::class, 'index'])->name('fallback');