@extends('layout.su')

@section('content')
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Penerimaan Barang</h1>

        <!-- Tombol untuk menampilkan form (modal) -->
        <button id="showModalButton"
            class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-200 mb-6">
            Tambah Barang
        </button>

        <!-- Modal (form yang muncul sebagai pop-up) -->
        <div id="barangModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
            <div class="bg-white p-8 shadow-lg rounded-lg w-full max-w-md">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Form Penerimaan Barang</h2>
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nama" class="block text-gray-700 text-sm font-medium">Nama Barang</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full border rounded-md px-4 py-2 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="kategori" class="block text-gray-700 text-sm font-medium">Kategori</label>
                        <select id="kategori" name="kategori"
                            class="w-full border rounded-md px-4 py-2 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih Kategori</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Furnitur">Furnitur</option>
                        </select>
                    </div>
                    <div>
                        <label for="jumlah" class="block text-gray-700 text-sm font-medium">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah"
                            class="w-full border rounded-md px-4 py-2 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="lokasi" class="block text-gray-700 text-sm font-medium">Lokasi Penyimpanan</label>
                        <input type="text" id="lokasi" name="lokasi"
                            class="w-full border rounded-md px-4 py-2 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                            Simpan
                        </button>
                    </div>
                </form>
                <button id="closeModalButton" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl">
                    &times;
                </button>
            </div>
        </div>

        <!-- Tabel Data Barang -->
        <div class="bg-white p-6 shadow-lg rounded-lg mt-8 overflow-x-auto">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Data Barang</h2>
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-700">Nama Barang</th>
                        <th class="py-3 px-4 text-left text-gray-700">Kategori</th>
                        <th class="py-3 px-4 text-left text-gray-700">Jumlah</th>
                        <th class="py-3 px-4 text-left text-gray-700">Lokasi Penyimpanan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Barang akan ditampilkan di sini -->
                    <tr class="border-t">
                        <td class="py-3 px-4 text-gray-700">Laptop</td>
                        <td class="py-3 px-4 text-gray-700">Elektronik</td>
                        <td class="py-3 px-4 text-gray-700">10</td>
                        <td class="py-3 px-4 text-gray-700">Gudang A</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-3 px-4 text-gray-700">Meja Kantor</td>
                        <td class="py-3 px-4 text-gray-700">Furnitur</td>
                        <td class="py-3 px-4 text-gray-700">5</td>
                        <td class="py-3 px-4 text-gray-700">Gudang B</td>
                    </tr>
                    <!-- Tambahkan lebih banyak data sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // JavaScript untuk membuka modal
            document.getElementById('showModalButton').addEventListener('click', function() {
                document.getElementById('barangModal').classList.remove('hidden');
            });

            // JavaScript untuk menutup modal
            document.getElementById('closeModalButton').addEventListener('click', function() {
                document.getElementById('barangModal').classList.add('hidden');
            });

            // Menutup modal jika mengklik area di luar modal
            window.addEventListener('click', function(event) {
                if (event.target === document.getElementById('barangModal')) {
                    document.getElementById('barangModal').classList.add('hidden');
                }
            });
        </script>
    @endpush
@endsection
