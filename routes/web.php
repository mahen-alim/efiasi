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
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

// Middleware 'auth' dan 'verified' diterapkan secara global untuk seluruh route dalam group ini
Route::middleware(['auth', 'verified'])->group(function () {
    // Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('sparepart', SparepartController::class);
        Route::resource('operational', OperationalController::class);
    });

    // Route service
    Route::get('/service-index', [ServiceController::class, 'index'])->name('dashboard.service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('dashboard.service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('dashboard.service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('dashboard.service.edit');
    Route::put('service/update/{id}', [ServiceController::class, 'update'])->name('dashboard.service.update');
    Route::delete('service/destroy/{id}', [ServiceController::class, 'destroy'])->name('dashboard.service.destroy');
    Route::get('service/search', [ServiceController::class, 'search'])->name('dashboard.service.search');

    // Route sparepart and operational
    Route::get('sparepart/search', [SparepartController::class, 'search'])->name('dashboard.sparepart.search');
    Route::get('operational/search', [OperationalController::class, 'search'])->name('dashboard.operational.search');

    // Route report
    Route::get('/report', [ReportController::class, 'index'])->name('dashboard.report.index');

    // Route income recap
    Route::get('/report/income', [IncomeRecapController::class, 'index'])->name('dashboard.report.income.index');
    Route::get('/report/income/table', [IncomeRecapController::class, 'table'])->name('dashboard.report.income.table');
    Route::get('/report/income/export', [IncomeRecapController::class, 'export'])->name('dashboard.report.income.export');

    // Route outcome recap
    Route::get('/report/outcome', [OutcomeRecapController::class, 'index'])->name('dashboard.report.outcome.index');
    Route::get('/report/outcome/table', [OutcomeRecapController::class, 'table'])->name('dashboard.report.outcome.table');
    Route::get('/report/export', [OutcomeRecapController::class, 'export'])->name('dashboard.report.export');

    // Route notification
    Route::get('/notif', [NotifController::class, 'index'])->name('dashboard.notif.index');
    Route::delete('/notif/destroy/{id}', [NotifController::class, 'destroy'])->name('dashboard.notif.destroy');

    // Route profile
    Route::get('/profile', [ProfilController::class, 'index'])->name('dashboard.profile.index');
    Route::get('/profile/edit/{id}', [ProfilController::class, 'edit'])->name('dashboard.profile.edit');
    Route::put('/profile/update/{id}', [ProfilController::class, 'update'])->name('dashboard.profile.update');

    // Route info bengkel
    Route::get('/info-bengkel', [InfoBengkelController::class, 'index'])->name('dashboard.info.bengkel');

    // Route upload
    Route::get('/upload', [UploadController::class, 'upload'])->name('dashboard.upload');
    Route::post('/upload/store', [UploadController::class, 'upload_file'])->name('dashboard.upload.file');
});

// Route Google Authentication
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callback']);
// Route untuk autentikasi Laravel
Auth::routes(['verify' => true]);
Route::get('/run-migrations', function () {
    Artisan::call('migrate');
    return 'Migrations run successfully';
});
// Route::get('/session/create', [SessionController::class, 'create']);
// Route::get('/session/show', [SessionController::class, 'show']);
// Route::get('/session/delete', [SessionController::class, 'delete']);

// Route::controller(PegawaiController::class)->group(function () {
//     Route::get('/pegawai/{nama}', 'index');
//     Route::get('/formulir', 'formulir');
//     Route::post('/formulir/proses', 'proses');
// });

// Route::get('/cobaerror', [CobaController::class, 'index']);
