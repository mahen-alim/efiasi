<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\IncomeRecapController;
use App\Http\Controllers\InfoBengkelController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\OutcomeRecapController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('sparepart', SparepartController::class);
        Route::resource('operational', OperationalController::class);
    });

    Route::get('/service-index', [ServiceController::class, 'index']);
    Route::get('service/create', [ServiceController::class, 'create'])->name('dashboard.service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('dashboard.service.store');
    Route::get('service/search', [ServiceController::class, 'search'])->name('dashboard.service.search');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('dashboard.service.edit');
    Route::put('service/update/{id}', [ServiceController::class, 'update'])->name('dashboard.service.update');
    Route::delete('service/destroy/{id}', [ServiceController::class, 'destroy'])->name('dashboard.service.destroy');
    Route::get('service/search', [ServiceController::class, 'search']);

    Route::get('sparepart/search', [SparepartController::class, 'search']);
    Route::get('operational/search', [OperationalController::class, 'search']);

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

    Route::controller(UploadController::class)->group(function () {
        Route::get('/upload', 'upload')->name('upload');
        Route::post('/upload/store', 'upload_file')->name('upload.file');
    });
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callback']);

Auth::routes(['verify' => true]);

// Route::get('/session/create', [SessionController::class, 'create']);
// Route::get('/session/show', [SessionController::class, 'show']);
// Route::get('/session/delete', [SessionController::class, 'delete']);

// Route::controller(PegawaiController::class)->group(function () {
//     Route::get('/pegawai/{nama}', 'index');
//     Route::get('/formulir', 'formulir');
//     Route::post('/formulir/proses', 'proses');
// });

// Route::get('/cobaerror', [CobaController::class, 'index']);
