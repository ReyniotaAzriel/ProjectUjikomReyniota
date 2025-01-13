<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\Peminjaman;

class BarangInventarisController extends Controller
{
    public function daftarBarang() {
        return view('super_user.barang_inventaris/DBarang');
    }
    public function penerimaanBarang()
    {
        return view('super_user.barang_inventaris.PBarang');
    }
    public function laporanBarang(){
        return view('super_user.laporan.laporanBarang');
    }
    public function laporanPeminjaman(){
        return view('super_user.laporan.laporanPeminjaman');
    }
    public function referensi(){
        return view('super_user.referensi.referensi');
    }

    public function jumlahBarang()
    {
        $jumlahBarang = BarangInventaris::count(); // Menghitung total barang
        $jumlahPeminjaman = Peminjaman::count();   // Menghitung total peminjaman
        
        // Mengelompokkan data peminjaman berdasarkan bulan
        $peminjamanPerBulan = Peminjaman::selectRaw('MONTH(pb_tgl) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Format data untuk 12 bulan (pastikan setiap bulan ada meski tidak ada data)
        $dataGrafik = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataGrafik[] = $peminjamanPerBulan[$i] ?? 0; // Jika bulan tidak ada data, set 0
        }

        return view('super_user.dashboard', compact('jumlahBarang', 'jumlahPeminjaman', 'dataGrafik'));
    }

    public function DBarang()
    {
        // Mengambil semua data barang dengan relasi jenisBarang
        $barang = BarangInventaris::with('jenis_barang')->get();
    
        // Mengirim data barang ke view
        return view('super_user.barang_inventaris.DBarang', compact('barang'));
    }
    
}
