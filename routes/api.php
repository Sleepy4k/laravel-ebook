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

// Index Route
Route::any('/', [Api\LandingController::class, 'index'])->name('landing.index');

// Single Route Resource
Route::resource('me', Api\HomeController::class, ['only' => ['index']]);
Route::resource('siswa', Api\SiswaController::class, ['except' => ['create', 'edit']]);
Route::resource('author', Api\AuthorController::class, ['except' => ['create', 'edit']]);
Route::resource('book', Api\BookController::class, ['except' => ['create', 'edit']]);
Route::resource('category', Api\BookCategoryController::class, ['except' => ['create', 'edit']]);
Route::resource('publisher', Api\PublisherController::class, ['except' => ['create', 'edit']]);
Route::resource('audit', Api\AuditController::class, ['only' => ['index', 'show']]);

// Fallback Route
Route::fallback([Api\FallbackController::class, 'index'])->name('fallback');