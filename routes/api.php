<?php

use App\Http\Controllers\apiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('services')->group(function () {
    Route::get('/get', [apiController::class, 'index']);
    Route::post('/post', [apiController::class, 'store']);  
    Route::put('/update/{id}', [apiController::class, 'update']);
    Route::delete('/delete/{id}', [apiController::class, 'destroy']);
    // Route::resource('/', apiController::class);
});

Route::prefix('reservations')->group(function () {
    Route::get('/get', [ReservationController::class, 'index']);
    Route::post('/post', [ReservationController::class, 'store']);  
    Route::put('/update/{id}', [ReservationController::class, 'update']);
    Route::delete('/delete/{id}', [ReservationController::class, 'destroy']);
});
