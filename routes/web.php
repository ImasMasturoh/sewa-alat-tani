<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AdminController;

// Routes Warga
Route::get('/', [WargaController::class, 'index'])->name('warga.index');
Route::post('/peminjaman', [WargaController::class, 'simpanPeminjaman'])->name('warga.peminjaman.simpan');

// Routes Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Manajemen Alat
    Route::post('/alat', [AdminController::class, 'simpanAlat'])->name('alat.simpan');
    Route::put('/alat/{alat}', [AdminController::class, 'updateAlat'])->name('alat.update');
    Route::delete('/alat/{alat}', [AdminController::class, 'hapusAlat'])->name('alat.hapus');
    
    // Update Status Peminjaman
    Route::put('/peminjaman/{peminjaman}', [AdminController::class, 'updateStatusPeminjaman'])->name('peminjaman.update');
});