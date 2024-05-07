<?php

use App\Http\Controllers\apiController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('user')->group(function () {
    Route::get('/getData', [apiController::class, 'getData']);
    Route::post('/postData', [apiController::class, 'postData']);
    Route::put('/updateData/{id}', [apiController::class, 'updateData']);
    Route::delete('/deleteData/{id}', [apiController::class, 'deleteData']);
});
