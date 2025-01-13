<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanBarangController extends Controller
{
    public function peminjamanBarang(){
        return view('super_user.peminjaman_barang.peminjaman');
    }
}
