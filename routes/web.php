<?php

use App\Http\Controllers\DashboardAntrianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontAntrianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home.public');
Route::get('/antrian', [FrontAntrianController::class, 'index'])->name('antrian.index');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/livewire/antrian/cetakAntrian', [FrontAntrianController::class, 'cetakAntrian'])->name('cetakAntrian');
    Route::post('/feedback', [FeedbackController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('feedback.store');

    Route::middleware('role:admin')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/antrian/bpkb', [DashboardAntrianController::class, 'indexLayananBpkb'])->name('dashboard.antrian.bpkb');
        Route::get('/antrian/stnk', [DashboardAntrianController::class, 'indexLayananStnk'])->name('dashboard.antrian.stnk');
        Route::get('/antrian/pajak', [DashboardAntrianController::class, 'indexLayananPajakKendaraan'])->name('dashboard.antrian.pajak');
        Route::get('/antrian/uji', [DashboardAntrianController::class, 'indexLayananUjiKendaraan'])->name('dashboard.antrian.uji');
        Route::get('/laporan', [DashboardLaporanController::class, 'index'])->name('dashboard.laporan.index');
        Route::get('/laporan/cetak', [DashboardLaporanController::class, 'cetakLaporan'])->name('cetakLaporan');
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('dashboard.feedback.index');
        Route::get('/feedback/{id}', [FeedbackController::class, 'show'])->whereNumber('id')->name('dashboard.feedback.show');
        Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->whereNumber('id')->name('dashboard.feedback.destroy');
    });
});
