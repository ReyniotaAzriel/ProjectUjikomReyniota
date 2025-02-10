<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BarangInventarisController,
    PeminjamanBarangController,
    AuthController,
    SuperUserController,
    LaporanBarangController,
    PengembalianController,
    ReferensiController,
    SiswaController,
    UserController
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
    Route::get('/barang/{br_kode}/edit', [BarangInventarisController::class, 'editBarang'])->name('editBarang');
    Route::put('/barang/{br_kode}', [BarangInventarisController::class, 'updateBarang'])->name('updateBarang');
    Route::delete('/barang/{br_kode}', [BarangInventarisController::class, 'hapusBarang'])->name('hapusBarang');




    // Peminjaman Barang
    Route::get('/peminjaman-barang', [PeminjamanBarangController::class, 'peminjamanBarang'])->name('peminjamanBarang');
    Route::post('/peminjaman-barang/store', [PeminjamanBarangController::class, 'simpanPeminjamanBarang'])->name('simpanPeminjamanBarang');

    // Pengembalian Barang
    Route::get('/pengembalian-barang', [PengembalianController::class, 'formPengembalian'])->name('pengembalianBarang');
    Route::post('/pengembalian-barang/store', [PengembalianController::class, 'simpanPengembalian'])->name('pengembalianBarang.store');
    // Laporan
    Route::get('/laporan-barang', [LaporanBarangController::class, 'laporanBarang'])->name('laporanBarang');
    Route::get('/laporan-peminjaman', [LaporanBarangController::class, 'laporanPeminjaman'])->name('laporanPeminjaman');

    // Jenis Barang
    Route::prefix('jenis-barang')->name('jenisBarang.')->group(function () {
        Route::get('/', [ReferensiController::class, 'index'])->name('index');
        Route::get('/create', [ReferensiController::class, 'create'])->name('create');
        Route::post('/store', [ReferensiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ReferensiController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ReferensiController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ReferensiController::class, 'destroy'])->name('destroy');
    });

    // daftar pengguna
    Route::get('/daftarPengguna', [UserController::class, 'index'])->name('daftarPengguna.index'); // Menampilkan daftar pengguna
    Route::get('/daftarPengguna/create', [UserController::class, 'create'])->name('daftarPengguna.create'); // Halaman tambah pengguna
    Route::post('/daftarPengguna/store', [UserController::class, 'store'])->name('daftarPengguna.store'); // Menyimpan data pengguna baru
    Route::get('/daftarPengguna/edit/{user_id}', [UserController::class, 'edit'])->name('daftarPengguna.edit'); // Halaman edit pengguna
    Route::put('/daftarPengguna/update/{user_id}', [UserController::class, 'update'])->name('daftarPengguna.update'); // Update data pengguna
    Route::delete('/daftarPengguna/destroy/{user_id}', [UserController::class, 'destroy'])->name('daftarPengguna.destroy'); // Hapus pengguna


    //daftar siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index'); // Menampilkan daftar siswa
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create'); // Menampilkan form tambah siswa
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store'); // Menyimpan siswa baru
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show'); // Menampilkan detail siswa
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit'); // Menampilkan form edit siswa
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update'); // Menyimpan perubahan data siswa
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy'); // Menghapus siswa

});
