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

// Home Route Resource
Route::resource('/', Api\HomeController::class, ['names' => 'home']);
Route::resource('/siswa', Api\SiswaController::class);

// Fallback Response
Route::fallback([Api\FallbackController::class, 'index']);