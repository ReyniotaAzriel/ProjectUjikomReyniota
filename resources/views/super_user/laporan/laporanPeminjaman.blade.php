@extends('layout.su')

@section('content')
    <div class="p-10 bg-gradient-to-br from-blue-100 to-indigo-200 min-h-screen">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-5xl font-extrabold text-gray-900 drop-shadow-lg">Laporan Peminjaman</h1>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">

            <!-- Filter Section -->
            <div class="w-full lg:w-1/3 bg-white shadow-2xl rounded-xl p-8 transform hover:scale-105 transition-all duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Filter Peminjaman</h2>
                <form action="{{ route('superuser.laporanPeminjaman') }}" method="GET">
                    <div class="space-y-6">

                        <!-- Nama Peminjam -->
                        <div>
                            <label for="siswa" class="block text-sm font-medium text-gray-700 mb-2">Siswa</label>
                            <input type="text" id="siswa" name="siswa" value="{{ request('siswa') }}"
                                placeholder="Cari nama peminjam..."
                                class="w-full p-3 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div>
                            <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman</label>
                            <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                                value="{{ request('tanggal_peminjaman') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Status Peminjaman -->
                        <div>
                            <label for="status_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Status Peminjaman</label>
                            <select id="status_peminjaman" name="status_peminjaman"
                                class="w-full p-3 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500">
                                <option value="">Semua</option>
                                <option value="Dipinjam" {{ request('status_peminjaman') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Dikembalikan" {{ request('status_peminjaman') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                <option value="Terlambat" {{ request('status_peminjaman') == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                            </select>
                        </div>

                        <!-- Tombol Cari -->
                        <div class="flex justify-center">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold px-8 py-3 rounded-lg shadow-xl hover:scale-110 transition-all duration-300">
                                Tampilkan Laporan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Laporan Table -->
            <div class="w-full lg:w-2/3 bg-white shadow-2xl rounded-xl p-8 overflow-hidden">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Hasil Laporan Peminjaman</h2>

                <div class="overflow-x-auto">
                    <table class="w-full bg-white border rounded-lg">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Siswa</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Nama Barang</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Peminjaman</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Kembali</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamanData as $index => $peminjaman)
                                @foreach ($peminjaman->peminjamanBarang as $barang)
                                    <tr class="border-b hover:bg-blue-100 transition-all duration-200">
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->siswa->nama_siswa }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $barang->barangInventaris->br_nama }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->pb_tgl->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->pb_harus_kembali_tgl->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">
                                            @if ($peminjaman->pb_stat == 0)
                                                <span class="px-3 py-1 bg-green-200 text-green-800 rounded-lg">Sudah Kembali</span>
                                            @else
                                                <span class="px-3 py-1 bg-red-200 text-red-800 rounded-lg">Belum Kembali</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
