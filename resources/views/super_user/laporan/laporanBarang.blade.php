@extends('layout.su')

@section('content')
    <div class="p-6 bg-gray-100">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Laporan Barang</h1>

        <!-- Filter Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-8 max-w-6xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Filter Laporan Barang</h2>
            <form action="" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kategori -->
                <div class="relative">
                    <label for="kategori" class="block text-sm font-medium text-gray-600 mb-2">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
                        <option value="">Semua</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Perabotan">Perabotan</option>
                        <option value="Kantor">Kantor</option>
                    </select>
                </div>
                <!-- Kondisi -->
                <div class="relative">
                    <label for="kondisi" class="block text-sm font-medium text-gray-600 mb-2">Kondisi</label>
                    <select id="kondisi" name="kondisi"
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
                        <option value="">Semua</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <!-- Periode -->
                <div class="relative">
                    <label for="periode" class="block text-sm font-medium text-gray-600 mb-2">Periode</label>
                    <input type="month" id="periode" name="periode"
                        class="block w-full border border-gray-300 rounded-lg shadow-sm text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-400">
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
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Hasil Laporan</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">No</th>
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Nama Barang</th>
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Kategori</th>
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Kondisi</th>
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Jumlah</th>
                            <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Static Data -->
                        <tr class="border-b">
                            <td class="px-4 py-3 text-sm text-gray-700">1</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Laptop HP</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Elektronik</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Baik</td>
                            <td class="px-4 py-3 text-sm text-gray-700">5</td>
                            <td class="px-4 py-3 text-sm text-gray-700">2024-01-01</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-3 text-sm text-gray-700">2</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Meja Kantor</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Perabotan</td>
                            <td class="px-4 py-3 text-sm text-gray-700">Rusak</td>
                            <td class="px-4 py-3 text-sm text-gray-700">2</td>
                            <td class="px-4 py-3 text-sm text-gray-700">2024-01-05</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
