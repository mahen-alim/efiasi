<?php

use App\Http\Controllers\apiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobileApi\OtpController;
use App\Http\Controllers\MobileApi\UsersMobileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\userApiController;
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

Route::prefix('users')->group(function () {
    Route::get('/get', [userApiController::class, 'index']);
    Route::post('/post', [userApiController::class, 'store']);
    Route::put('/update/{id}', [userApiController::class, 'update']);
    Route::delete('/delete/{id}', [userApiController::class, 'destroy']);
});

Route::group(['prefix' => '/MobileApi'], function () {
    Route::post('/login', [UsersMobileController::class, 'login']);
    Route::post('/google', [UsersMobileController::class, 'signinGoogle']);
    Route::post('/register', [UsersMobileController::class, 'register']);
    Route::post('/otp', [OtpController::class, 'sendOtp']);
    Route::post('/profile', [UsersMobileController::class, 'profile']);
    Route::post('/pemesanan', [UsersMobileController::class, 'pemesanan']);
    Route::post('/editprofile', [UsersMobileController::class, 'editProfile']);
    Route::post('/Kirimulasan', [UsersMobileController::class, 'kirimUlasan']);
    Route::post('/resetpassword', [UsersMobileController::class, 'resetpassword']);
    Route::post('/history', [UsersMobileController::class, 'history']);
});
