@extends('layout.su')

@section('content')
    <div class="container mx-auto py-8 px-4">

        <!-- Form Penerimaan Barang -->
        <div class="bg-gradient-to-br from-cyan-600 via-blue-500 to-indigo-600 p-10 rounded-3xl shadow-2xl w-full mb-8 transform hover:scale-105 transition duration-500 ease-in-out">
            <h2 class="text-4xl font-extrabold mb-8 text-white text-center animate__animated animate__fadeInUp">Form Penerimaan Barang</h2>
            <form action="{{ route('superuser.barangStore') }}" method="POST"
                class="space-y-8 bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-500 ease-in-out">
                @csrf
                <div class="space-y-4">
                    <label for="nama" class="block text-gray-800 text-lg font-semibold">Nama Barang</label>
                    <input type="text" id="nama" name="nama"
                        class="w-full border-2 border-gray-300 rounded-lg px-6 py-3 text-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 placeholder-gray-500 text-lg shadow-lg"
                        placeholder="Masukkan nama barang" required>
                </div>
                <div class="space-y-4">
                    <label for="kategori" class="block text-gray-800 text-lg font-semibold">Kategori</label>
                    <select id="kategori" name="kategori" required
                        class="w-full border-2 border-gray-300 rounded-lg px-6 py-3 text-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-lg shadow-lg">
                        <option value="">Pilih Kategori</option>
                        @if (isset($jenisBarang) && $jenisBarang->count())
                            @foreach ($jenisBarang as $kategori)
                                <option value="{{ $kategori->jns_brg_kode }}">{{ $kategori->jns_brg_nama }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>Tidak ada kategori tersedia</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label for="br_status" class="block text-gray-700 text-sm font-semibold">Status</label>
                    <select id="br_status" name="br_status" required
                    class="w-full border-2 border-gray-300 rounded-lg px-6 py-3 text-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-lg shadow-lg">
                    <option value="1">Barang Baik</option>
                    <option value="2">Barang Kurang Baik</option>
                    <option value="3">Barang Rusak</option>
                    </select>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-gradient-to-l transition duration-300 ease-in-out transform hover:scale-110">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
