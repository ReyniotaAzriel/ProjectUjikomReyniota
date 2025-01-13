@extends('layout.su')

@section('content')
    <main class="flex-1 p-6 bg-gray-50">
        <div class="container mx-auto py-8">
            <!-- Tab Navigation -->
            <div class="mb-6">
                <ul class="flex space-x-6 text-lg font-semibold text-indigo-600">
                    <li>
                        <a href="#daftarPeminjaman" class="hover:text-indigo-800">Daftar Peminjaman</a>
                    </li>
                </ul>
            </div>

            <!-- Daftar Peminjaman -->
            <div id="daftarPeminjaman" class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Peminjaman</h2>
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Nama Barang</th>
                            <th class="px-4 py-2 text-left">Peminjam</th>
                            <th class="px-4 py-2 text-left">Tanggal Peminjaman</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data -->
                        <tr class="border-b">
                            <td class="px-4 py-2">Meja Kantor</td>
                            <td class="px-4 py-2">eka dan januar</td>
                            <td class="px-4 py-2">25-01-2025</td>
                            <td class="px-4 py-2">Belum Kembali </td>
                        </tr>
                        <!-- Tambahkan Data Lain -->
                    </tbody>
                </table>
            </div>

            <!-- Tombol untuk Membuka Modal -->
            <button id="openModalBtn"
                class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Form Peminjaman
            </button>

            <!-- Modal Form Peminjaman -->
            <div id="modalForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
                    <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Form Peminjaman Barang</h2>
                    <form action="/peminjaman/create" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="barang" class="block text-gray-700 font-medium">Pilih Barang</label>
                                <select id="barang" name="barang"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="meja">Meja Kantor</option>
                                    <option value="kursi">Kursi Kantor</option>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah" class="block text-gray-700 font-medium">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="peminjam" class="block text-gray-700 font-medium">Nama Peminjam</label>
                                <input type="text" id="peminjam" name="peminjam"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="tanggal_peminjaman" class="block text-gray-700 font-medium">Tanggal
                                    Peminjaman</label>
                                <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full mt-6 bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Pinjam</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalForm = document.getElementById('modalForm');

        openModalBtn.addEventListener('click', () => {
            modalForm.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modalForm.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modalForm) {
                modalForm.classList.add('hidden');
            }
        });
    </script>
@endsection
