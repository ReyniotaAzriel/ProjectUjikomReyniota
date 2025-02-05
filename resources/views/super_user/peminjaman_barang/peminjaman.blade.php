@extends('layout.su')

@section('content')
    <main class="flex-1 p-6 bg-gradient-to-r from-blue-100 to-indigo-200">
        <div class="container mx-auto py-8">
            <!-- Tab Navigation -->
            <div class="mb-6">
                <ul class="flex space-x-6 text-lg font-semibold text-indigo-700">
                    <li>
                        <a href="#daftarPeminjaman" class="hover:text-indigo-900 transition duration-300">Daftar Peminjaman</a>
                    </li>
                </ul>
            </div>

            <!-- Daftar Peminjaman -->
            <div id="daftarPeminjaman" class="bg-white shadow-2xl rounded-3xl p-8 mb-8 transition-transform transform hover:scale-105 duration-300">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Daftar Peminjaman</h2>
                <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">Tanggal Peminjaman</th>
                            <th class="px-6 py-4 text-left">No Siswa</th>
                            <th class="px-6 py-4 text-left">Nama Siswa</th>
                            <th class="px-6 py-4 text-left">Nama Barang</th>
                            <th class="px-6 py-4 text-left">Harus Kembali Tanggal</th>
                            <th class="px-6 py-4 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $pinjam)
                            @foreach ($pinjam->peminjamanBarang as $barangPinjam)
                                <tr class="border-b hover:bg-indigo-50 transition duration-300">
                                    <td class="px-6 py-4">{{ $pinjam->pb_tgl->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->siswa->no_siswa }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4">{{ $barangPinjam->barangInventaris->br_nama }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->pb_harus_kembali_tgl->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if ($pinjam->pb_stat == '1')
                                            <span class="text-green-500 font-semibold">Peminjaman Aktif</span>
                                        @else
                                            <span class="text-gray-500 font-semibold">Peminjaman Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tombol untuk Membuka Modal -->
            <button id="openModalBtn"
                class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-gradient-to-l transition duration-300 ease-in-out">
                Form Peminjaman
            </button>

            <!-- Modal Form Peminjaman -->
            <div id="modalForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-2xl w-full max-w-2xl p-8 relative transform transition-all duration-300 scale-95 hover:scale-100">
                    <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>
                    <h2 class="text-2xl font-extrabold text-gray-800 mb-6">Form Peminjaman Barang</h2>
                    <form action="{{ route('superuser.simpanPeminjamanBarang') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="siswa_id" class="block text-sm font-semibold text-gray-700">Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->siswa_id }}">{{ $item->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="br_kode" class="block text-sm font-semibold text-gray-700">Barang</label>
                            <select name="br_kode" id="br_kode" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                @foreach ($barang as $item)
                                    <option value="{{ $item->br_kode }}">{{ $item->br_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="pb_tgl" class="block text-sm font-semibold text-gray-700">Tanggal Peminjaman</label>
                            <input type="date" name="pb_tgl" id="pb_tgl" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>

                        <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:bg-gradient-to-l transition duration-300 ease-in-out">
                            Pinjam Barang
                        </button>
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
