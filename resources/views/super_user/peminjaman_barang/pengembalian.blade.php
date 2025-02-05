@extends('layout.su')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-200 to-indigo-300 p-8">
        <div class="w-full max-w-4xl bg-white shadow-xl rounded-3xl p-10 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <h2 class="text-4xl font-bold text-gray-800 text-center mb-8">Form Pengembalian Barang</h2>

            <form action="{{ route('superuser.pengembalianBarang.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Pilih Peminjaman -->
                <div>
                    <label for="pb_id" class="text-xl font-semibold text-gray-700 mb-3 block">Pilih Peminjaman</label>
                    <select name="pb_id" id="pb_id" class="w-full border-gray-300 rounded-xl p-4 text-lg shadow-sm focus:ring-2 focus:ring-indigo-600 transition duration-300" required>
                        <option value="">-- Pilih Peminjaman --</option>
                        @foreach ($peminjaman as $item)
                            <option value="{{ $item->pb_id }}">
                                {{ $item->siswa->nama_siswa }} -
                                {{ $item->peminjamanBarang[0]->barangInventaris->br_nama ?? 'Barang Tidak Ditemukan' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Pengembalian -->
                <div>
                    <label for="kembali_tgl" class="text-xl font-semibold text-gray-700 mb-3 block">Tanggal Pengembalian</label>
                    <input type="date" name="kembali_tgl" id="kembali_tgl" class="w-full border-gray-300 rounded-xl p-4 text-lg shadow-sm focus:ring-2 focus:ring-indigo-600 transition duration-300" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-semibold px-10 py-4 rounded-xl text-lg shadow-lg hover:scale-105 transform transition duration-300 ease-in-out">
                        Simpan Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
