<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/service', [ServiceController::class, 'index']);
    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service/create', [ServiceController::class, 'create']);
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit']);
    Route::put('/service/{id}', [ServiceController::class, 'update']);
    Route::delete('/service/{id}', [ServiceController::class, 'destroy']);
    Route::get('/sparepart', [SparepartController::class, 'index']);
    Route::post('/sparepart', [SparepartController::class, 'store']);
    Route::get('/sparepart/create', [SparepartController::class, 'create']);
    Route::get('/sparepart/{id}/edit', [SparepartController::class, 'edit']);
    Route::put('/sparepart/{id}', [SparepartController::class, 'update']);
    Route::delete('/sparepart/{id}', [SparepartController::class, 'destroy']);
    Route::get('/operational', [OperationalController::class, 'index']);
    Route::post('/operational', [OperationalController::class, 'store']);
    Route::get('/operational/create', [OperationalController::class, 'create']);
    Route::get('/operational/{id}/edit', [OperationalController::class, 'edit']);
    Route::put('/operational/{id}', [OperationalController::class, 'update']);
    Route::delete('/operational/{id}', [OperationalController::class, 'destroy']);
    Route::get('/report', [ReportController::class, 'index']);
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
