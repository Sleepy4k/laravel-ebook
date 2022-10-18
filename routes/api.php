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
});

// Home Route Resource
Route::resource('/me', Api\HomeController::class, ['names' => 'home']);
Route::resource('/siswa', Api\SiswaController::class);
Route::resource('/author', Api\AuthorController::class);

// Fallback Response
Route::fallback([Api\FallbackController::class, 'index']);