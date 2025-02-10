@extends('layout.su')

@section('content')
<main class="flex flex-col justify-center items-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">✏️ Edit Barang</h1>

        <!-- Form Edit Barang -->
        <form id="editBarangForm" action="{{ route('superuser.updateBarang', $barang->br_kode) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Barang -->
            <div>
                <label class="block text-gray-700 font-medium">📝 Nama Barang:</label>
                <input type="text" name="nama" value="{{ old('nama', $barang->br_nama) }}"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            <!-- Kategori Barang -->
            <div>
                <label class="block text-gray-700 font-medium">📂 Kategori:</label>
                <select name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    @foreach ($jenisBarang as $jenis)
                        <option value="{{ $jenis->jns_brg_kode }}"
                            {{ $barang->jns_brg_kode == $jenis->jns_brg_kode ? 'selected' : '' }}>
                            {{ $jenis->jns_brg_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Barang -->
            <div>
                <label class="block text-gray-700 font-medium">📌 Status Barang:</label>
                <select name="br_status" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    <option value="1" {{ $barang->br_status == 1 ? 'selected' : '' }}>✅ Barang Baik</option>
                    <option value="2" {{ $barang->br_status == 2 ? 'selected' : '' }}>⚠️ Barang Kurang Baik</option>
                    <option value="3" {{ $barang->br_status == 3 ? 'selected' : '' }}>❌ Barang Rusak</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between mt-8">
                <a href="#" id="btnBatal"
                   class="px-6 py-3 bg-gray-400 text-white font-medium rounded-lg shadow-md hover:bg-gray-500 transition duration-300">
                    ❌ Batal
                </a>
                <button type="submit" id="btnSimpan"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi sebelum menyimpan perubahan
    document.getElementById('btnSimpan').addEventListener('click', function (event) {
        event.preventDefault(); // Stop form submission
        Swal.fire({
            title: "Konfirmasi Simpan",
            text: "Apakah Anda yakin ingin menyimpan perubahan?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Simpan!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editBarangForm').submit(); // Submit form jika user menekan "Ya"
            }
        });
    });

    // Konfirmasi sebelum batal
    document.getElementById('btnBatal').addEventListener('click', function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Batal Edit?",
            text: "Perubahan yang belum disimpan akan hilang.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Kembali",
            cancelButtonText: "Tetap di sini"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('superuser.daftarBarang') }}";
            }
        });
    });

    // SweetAlert ketika barang berhasil diubah
    @if(session('success'))
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 1500,
            timerProgressBar: true,
            showConfirmButton: false
        });
    @endif
</script>
@endsection
