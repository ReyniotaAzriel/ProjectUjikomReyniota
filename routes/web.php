<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::prefix('super-user')->name('superuser.')->group(function () {
    // Dashboard route untuk Super User
    Route::get('/dashboard', [BarangInventarisController::class, 'jumlahBarang'])->name('dashboard');
    
    // Routes untuk Barang Inventaris
    Route::get('/daftar-barang', [BarangInventarisController::class, 'DBarang'])->name('daftarBarang');
    Route::get('/penerimaan-barang', [BarangInventarisController::class, 'penerimaanBarang'])->name('penerimaanBarang');
    Route::get('/laporan-barang', [BarangInventarisController::class, 'laporanBarang'])->name('laporanBarang');
    
    // Routes untuk Peminjaman Barang
    Route::get('/peminjaman-barang', [PeminjamanBarangController::class, 'peminjamanBarang'])->name('peminjamanBarang');
    Route::get('/laporan-peminjaman', [BarangInventarisController::class, 'laporanPeminjaman'])->name('laporanPeminjaman');
    
    // Routes untuk Jenis Barang dan Referensi
    Route::get('/jenis-barang', [SuperUserController::class, 'jenisBarang'])->name('jenisBarang');
    Route::get('/daftar-pengguna', [SuperUserController::class, 'daftarPengguna'])->name('daftarPengguna');
});

