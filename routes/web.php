<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PenjualanController;




Route::get('/', function () {
    return view('layouts.app');
})->name('dashboard')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('pembelis', PembeliController::class);
    Route::resource('supliers', SuplierController::class);
    Route::resource('pembelians', pembelianController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('barangs', BarangController::class);
    Route::resource('penjualans', PenjualanController::class);
    Route::resource('detail-penjualans', DetailPenjualanController::class);

});

Route::get('penjualans/laporan-pdf', [CetakController::class, 'cetakPdf'])->name('penjualans.laporan_pdf')->middleware('auth');
