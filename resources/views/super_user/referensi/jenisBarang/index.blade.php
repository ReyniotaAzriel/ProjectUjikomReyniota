@extends('layout.su')

@section('content')
<div class="container mx-auto p-6">
    <!-- Flash Message -->
    @if(session('success'))
    <div id="alert" class="mb-4 flex items-center justify-between bg-green-500 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md">
        <span>✅ {{ session('success') }}</span>
        <button onclick="document.getElementById('alert').style.display='none'" class="text-xl font-bold">&times;</button>
    </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-4xl font-bold text-indigo-700">Daftar Jenis Barang</h2>
        <a href="{{ route('superuser.jenisBarang.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-full shadow-lg hover:from-indigo-600 hover:to-blue-600 transition-transform transform hover:scale-105">
            + Tambah Jenis Barang
        </a>
    </div>

    <!-- Table Container with Hover Effect -->
    <div class="overflow-hidden rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-2xl hover:scale-105">
        <table class="w-full bg-white text-gray-700">
            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-left text-lg font-semibold">ID</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Nama Jenis Barang</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($jenisBarang as $item)
                <tr class="hover:bg-gray-100 transition-all duration-300">
                    <td class="py-4 px-6 text-md font-medium">{{ $item->jns_brg_kode }}</td>
                    <td class="py-4 px-6 text-md">{{ $item->jns_brg_nama }}</td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('superuser.jenisBarang.edit', $item->jns_brg_kode) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition-transform transform hover:scale-110">
                            ✏️ Edit
                        </a>
                        <button onclick="confirmDelete('{{ route('superuser.jenisBarang.destroy', $item->jns_brg_kode) }}')"
                                class="bg-red-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-600 transition-transform transform hover:scale-110">
                            🗑️ Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Jenis barang ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.action = deleteUrl;
                form.method = 'POST';
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
