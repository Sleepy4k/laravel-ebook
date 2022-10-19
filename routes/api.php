<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Response;
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
Route::any('/', function() {
    return response()->json([
        "status" => Response::HTTP_OK,
        "message" => "API working fine"
    ]);
})->name('landing');

// Home Route Resource
Route::resource('/me', Api\HomeController::class, ['only' => ['index']]);
Route::resource('/siswa', Api\SiswaController::class, ['except' => ['create', 'edit']]);
Route::resource('/author', Api\AuthorController::class, ['except' => ['create', 'edit']]);
Route::resource('/book', Api\BookController::class, ['except' => ['create', 'edit']]);

// Fallback Response
Route::fallback([Api\FallbackController::class, 'index'])->name('fallback');