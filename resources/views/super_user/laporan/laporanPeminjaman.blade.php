@extends('layout.su')

@section('content')
    <div class="p-6 bg-gray-100">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Peminjaman</h1>

        <!-- Filter Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-8 max-w-6xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Filter Peminjaman</h2>
            <form action="{{ route('laporan.peminjaman') }}" method="GET"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Nama Peminjam -->
                <div class="relative">
                    <label for="nama_peminjam" class="block text-sm font-medium text-gray-600 mb-2">Nama Peminjam</label>
                    <input type="text" id="nama_peminjam" name="nama_peminjam" placeholder="Cari nama peminjam..."
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
                </div>
                <!-- Tanggal Peminjaman -->
                <div class="relative">
                    <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-600 mb-2">Tanggal
                        Peminjaman</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
                </div>
                <!-- Status Peminjaman -->
                <div class="relative">
                    <label for="status_peminjaman" class="block text-sm font-medium text-gray-600 mb-2">Status
                        Peminjaman</label>
                    <select id="status_peminjaman" name="status_peminjaman"
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
                        <option value="">Semua</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Terlambat">Terlambat</option>
                    </select>
                </div>
                <!-- Tombol Cari -->
                <div class="flex justify-center sm:col-span-3 mt-6">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-8 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        Tampilkan Laporan
                    </button>
                </div>
            </form>
        </div>

        <!-- Laporan Table -->
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Hasil Laporan Peminjaman</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">No</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">Nama Peminjam</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">Nama Barang</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">Tanggal Peminjaman</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">Tanggal Kembali</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row, repeat this for each item in the report -->
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-600">1</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Johan</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Laptop</td>
                            <td class="px-6 py-4 text-sm text-gray-600">2025-01-05</td>
                            <td class="px-6 py-4 text-sm text-gray-600">2025-01-12</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Dikembalikan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
