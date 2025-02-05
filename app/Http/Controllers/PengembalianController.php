<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\BarangInventaris;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function formPengembalian()
    {
        // Ambil daftar peminjaman yang belum dikembalikan
        $peminjaman = Peminjaman::with(['siswa', 'peminjamanBarang.barangInventaris'])
            ->where('pb_stat', '1') // Status "01" untuk belum dikembalikan
            ->get();

        return view('super_user.peminjaman_barang.pengembalian', compact('peminjaman'));
    }

    /**
     * Menyimpan data pengembalian barang.
     */
    public function simpanPengembalian(Request $request)
    {
        $validated = $request->validate([
            'pb_id' => 'required|exists:tm_peminjaman,pb_id',
            'kembali_tgl' => 'required|date_format:Y-m-d',
        ]);

        try {
            DB::beginTransaction();

            // Simpan data pengembalian
            $pengembalian = new Pengembalian();
            $pengembalian->kembali_id = strtoupper(uniqid('KB')); // ID unik lebih rapi
            $pengembalian->pb_id = $request->pb_id;
            $pengembalian->user_id = 'U001'; // Ambil ID user yang login
            $pengembalian->kembali_tgl = $request->kembali_tgl;
            $pengembalian->kembali_sts = '0'; // Status 02 menandakan barang dikembalikan
            $pengembalian->save();

            // Perbarui status peminjaman menjadi selesai
            $peminjaman = Peminjaman::findOrFail($request->pb_id);
            $peminjaman->pb_stat = '0'; // Status "00" menandakan peminjaman selesai
            $peminjaman->save();

            // Perbarui status barang menjadi tersedia
            if ($peminjaman->peminjamanBarang) {
                foreach ($peminjaman->peminjamanBarang as $peminjamanBarang) {
                    $barang = BarangInventaris::find($peminjamanBarang->br_kode);
                    if ($barang) {
                        $barang->br_status = '1'; // Status "01" menandakan barang tersedia
                        $barang->save();
                    }
                }
            }

            DB::commit();

            return redirect()->route('superuser.peminjamanBarang')->with('success', 'Pengembalian barang berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
