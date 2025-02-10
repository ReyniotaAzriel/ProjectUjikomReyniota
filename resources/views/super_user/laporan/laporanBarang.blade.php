@extends('layout.su')

@section('content')
    <div class="p-8 bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen">

        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gray-900 drop-shadow-lg">Laporan Barang</h1>
        </div>

        <!-- Container -->
        <div class="flex flex-col lg:flex-row gap-12 items-start">

            <!-- Filter Section -->
            <div class="bg-white shadow-2xl rounded-lg p-10 w-full lg:w-1/3 transform transition-all hover:scale-105 duration-300">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Filter Laporan Barang</h2>
                <form action="{{ route('superuser.laporanBarang') }}" method="GET">
                    <div class="space-y-6">
                        <!-- Jenis Barang -->
                        <div class="relative">
                            <label for="jns_brg" class="block text-lg font-medium text-gray-700 mb-2">Jenis Barang</label>
                            <select id="jns_brg" name="jns_brg"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-md text-gray-700 focus:ring-2 focus:ring-blue-500 transition-transform duration-300 transform hover:scale-105">
                                <option value="">Semua</option>
                                @foreach ($jenisBarangs as $jenis)
                                    <option value="{{ $jenis->jns_brg_kode }}"
                                        {{ request('jns_brg') == $jenis->jns_brg_kode ? 'selected' : '' }}>
                                        {{ $jenis->jns_brg_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Periode -->
                        <div class="relative">
                            <label for="periode" class="block text-lg font-medium text-gray-700 mb-2">Periode</label>
                            <input type="month" id="periode" name="periode"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-md text-gray-700 focus:ring-2 focus:ring-blue-500 transition-transform duration-300 transform hover:scale-105"
                                value="{{ request('periode') }}">
                        </div>

                        <!-- Tombol Cari -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-lg font-bold px-8 py-4 rounded-lg shadow-lg hover:bg-gradient-to-l transition-all duration-300">
                                Tampilkan Laporan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Laporan Table -->
            <div class="bg-white shadow-2xl rounded-lg p-10 w-full lg:w-2/3">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Hasil Laporan</h2>

                <!-- Pesan Jika Tidak Ada Data -->
                @if (!empty($message))
                    <div class="bg-yellow-300 text-yellow-900 p-4 rounded-lg mb-6">
                        {{ $message }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-blue-700 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-lg font-semibold">No</th>
                                <th class="px-6 py-4 text-left text-lg font-semibold">Nama Barang</th>
                                <th class="px-6 py-4 text-left text-lg font-semibold">Jenis Barang</th>
                                <th class="px-6 py-4 text-left text-lg font-semibold">Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangInventaris as $index => $barang)
                                <tr class="border-b hover:bg-blue-100 transition-colors duration-200">
                                    <td class="px-6 py-4 text-lg text-gray-800">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-lg text-gray-800">{{ $barang->br_nama }}</td>
                                    <td class="px-6 py-4 text-lg text-gray-800">{{ $barang->jenis_barang->jns_brg_nama }}</td>
                                    <td class="px-6 py-4 text-lg text-gray-800">{{ $barang->br_tgl_terima }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
