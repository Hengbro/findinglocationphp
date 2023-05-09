<?php

use App\Http\Controllers\Api\LokasiController;
use App\Http\Controllers\Api\PrductPlaceController;
use App\Http\Controllers\Api\TempatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::put('update-profil/{id}', [AuthController::class, 'update']);
Route::post('upload-imguser/{id}', [AuthController::class, 'upload']);

Route::resource('tempat', TempatController::class);
Route::get('tempat-user', [TempatController::class, 'cekTempat']);
Route::resource('lokasi-tempat', LokasiController::class);
Route::resource('product-place', PrductPlaceController::class);




