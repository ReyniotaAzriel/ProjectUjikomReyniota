<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['jurusan', 'kelas'])->get(); // Ambil data siswa beserta relasi
        return view('super_user.referensi.daftarSiswa.index', compact('siswa'));
    }




    public function create()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('super_user.referensi.daftarSiswa.create', compact('jurusan', 'kelas'));
    }


    public function store(Request $request)
    {
        // Cari ID siswa terakhir
        $latestSiswa = Siswa::orderBy('siswa_id', 'desc')->first();

        if (!$latestSiswa) {
            $newId = 'SIS001';
        } else {
            $lastNumber = (int) substr($latestSiswa->siswa_id, 3);
            $newId = 'SIS' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        // Simpan data siswa dengan relasi ke jurusan dan kelas
        Siswa::create([
            'siswa_id'   => $newId, // ID otomatis
            'nisn'       => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id'   => $request->kelas_id,
            'no_siswa'   => $request->no_siswa,
        ]);

        return redirect()->route('superuser.siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }




    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $jurusan = Jurusan::all(); // Ambil semua data jurusan
        $kelas = Kelas::all(); // Ambil semua data kelas

        return view('super_user.referensi.daftarSiswa.edit', compact('siswa', 'jurusan', 'kelas'));
    }


    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('superuser.siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->route('superuser.siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
