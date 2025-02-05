<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BarangInventarisController,
    PeminjamanBarangController,
    AuthController,
    SuperUserController,
    LaporanBarangController,
    PengembalianController,
    ReferensiController
};

// Rute untuk login dan autentikasi
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute dengan proteksi middleware auth
Route::prefix('super-user')->name('superuser.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [SuperUserController::class, 'jumlahBarang'])->name('dashboard');

    // Barang Inventaris
    Route::get('/daftar-barang', [BarangInventarisController::class, 'DBarang'])->name('daftarBarang');
    Route::get('/penerimaan-barang', [BarangInventarisController::class, 'PBarang'])->name('penerimaanBarang');
    Route::post('/penerimaan-barang/store', [BarangInventarisController::class, 'barangStore'])->name('barangStore');

    // Peminjaman Barang
    Route::get('/peminjaman-barang', [PeminjamanBarangController::class, 'peminjamanBarang'])->name('peminjamanBarang');
    Route::post('/peminjaman-barang/store', [PeminjamanBarangController::class, 'simpanPeminjamanBarang'])->name('simpanPeminjamanBarang');

    // Pengembalian Barang
    Route::get('/pengembalian-barang', [PengembalianController::class, 'formPengembalian'])->name('pengembalianBarang');
    Route::post('/pengembalian-barang/store', [PengembalianController::class, 'simpanPengembalian'])->name('pengembalianBarang.store');
    // Laporan
    Route::get('/laporan-barang', [LaporanBarangController::class, 'laporanBarang'])->name('laporanBarang');
    Route::get('/laporan-peminjaman', [LaporanBarangController::class, 'laporanPeminjaman'])->name('laporanPeminjaman');

    // Referensi
    Route::get('/jenis-barang', [ReferensiController::class, 'jenisBarang'])->name('jenisBarang');
    Route::get('/daftar-pengguna', [ReferensiController::class, 'daftarPengguna'])->name('daftarPengguna');
});


