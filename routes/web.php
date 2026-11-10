<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunSiswaController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\LaporanController;

// LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.authenticate');
});

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// HALAMAN ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('buku', BukuController::class)
        ->except(['show']);

    Route::resource('anggota', AnggotaController::class)
        ->except(['show'])
        ->parameters(['anggota' => 'anggota']);

    Route::resource('peminjaman', PeminjamanController::class)
        ->only(['index', 'create', 'store']);

    Route::patch('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])
        ->name('peminjaman.kembalikan');

    Route::get('/laporan/export', [LaporanController::class, 'export'])
        ->name('laporan.export');
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
    Route::resource('akun-siswa', AkunSiswaController::class)
        ->only(['index', 'create', 'store']);
});

// HALAMAN SISWA
Route::middleware(['auth', 'role:siswa'])->group(function () {

    Route::get('/siswa/peminjaman/{id}', [SiswaDashboardController::class, 'detail'])
        ->name('siswa.peminjaman.detail');
    Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])
        ->name('siswa.dashboard');

});