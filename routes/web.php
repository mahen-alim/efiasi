<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\IncomeRecapController;
use App\Http\Controllers\InfoBengkelController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\OutcomeRecap;
use App\Http\Controllers\OutcomeRecapController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RekapUangController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/service', 'index');
        Route::post('/service', 'store')->name('service.file');
        Route::get('/service/search', 'search');
        Route::get('/service/create', 'create');
        Route::get('/service/{id}/edit', 'edit');
        Route::put('/service/{id}', 'update');
        Route::delete('/service/{id}', 'destroy');
    });

    Route::controller(SparepartController::class)->group(function () {
        Route::get('/sparepart', 'index');
        Route::post('/sparepart', 'store');
        Route::get('/sparepart/search', 'search');
        Route::get('/sparepart/create', 'create');
        Route::get('/sparepart/{id}/edit', 'edit');
        Route::put('/sparepart/{id}', 'update');
        Route::delete('/sparepart/{id}', 'destroy');
    });

    Route::controller(OperationalController::class)->group(function () {
        Route::get('/operational', 'index');
        Route::post('/operational', 'store');
        Route::get('/operational/search', 'search');
        Route::get('/operational/create', 'create');
        Route::get('/operational/{id}/edit', 'edit');
        Route::put('/operational/{id}', 'update');
        Route::delete('/operational/{id}', 'destroy');
    });

    Route::get('/report', [ReportController::class, 'index']);

    Route::controller(IncomeRecapController::class)->group(function () {
        Route::get('/report/income', 'index');
        Route::get('/report/income/table', 'table');
        Route::get('/report/export', 'export')->name('report.export');
    });

    Route::controller(OutcomeRecapController::class)->group(function () {
        Route::get('/report/outcome', 'index');
        Route::get('/report/outcome/table', 'table');
        Route::get('/report/export', 'export')->name('report.export');
    });

    Route::get('/notif', [NotifController::class, 'index']);

    Route::controller(ProfilController::class)->group(function () {
        Route::get('/profil', 'index')->name('profile.index');
        Route::get('/profil/edit/{id}', 'edit')->name('profil.edit');
        Route::put('/profil/update/{id}', 'update')->name('profil.update');
    });

    Route::get('/info-bengkel', [InfoBengkelController::class, 'index'])->name('info.bengkel');

    // Route::controller(UploadController::class)->group(function () {
    //     Route::get('/dropzone', 'dropzone')->name('dropzone');
    //     Route::post('/dropzone/store', 'dropzone_file')->name('dropzone.file');
    // });
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callback']);

Auth::routes();


// Route::get('/session/create', [SessionController::class, 'create']);
// Route::get('/session/show', [SessionController::class, 'show']);
// Route::get('/session/delete', [SessionController::class, 'delete']);

// Route::controller(PegawaiController::class)->group(function () {
//     Route::get('/pegawai/{nama}', 'index');
//     Route::get('/formulir', 'formulir');
//     Route::post('/formulir/proses', 'proses');
// });

// Route::get('/cobaerror', [CobaController::class, 'index']);
