@extends('layout.su')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Flash Message -->
    @if(session('success'))
    <div id="alert" class="mb-4 flex items-center justify-between bg-green-500 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md">
        <span>✅ {{ session('success') }}</span>
        <button onclick="document.getElementById('alert').style.display='none'" class="text-xl font-bold">&times;</button>
    </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-4xl font-bold text-indigo-700">Daftar Pengguna</h2>
        <a href="{{ route('superuser.daftarPengguna.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-full shadow-lg hover:from-indigo-600 hover:to-blue-600 transition-transform transform hover:scale-105">
            + Tambah Pengguna
        </a>
    </div>

    <!-- Table Container with Hover Effect -->
    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg transition-all duration-300 group hover:shadow-2xl hover:scale-[1.02]">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-left text-lg font-semibold">ID</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Nama</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Hak Akses</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Status</th>
                    <th class="py-4 px-6 text-center text-lg font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr class="group-hover:bg-gray-100 transition-all duration-300">
                    <td class="py-4 px-6">{{ $user->user_id }}</td>
                    <td class="py-4 px-6">{{ $user->user_nama }}</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 text-sm font-medium bg-blue-500 text-white rounded-full">
                            {{ ucfirst($user->user_hak) }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $user->user_sts ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ $user->user_sts ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('superuser.daftarPengguna.edit', $user->user_id) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition-transform transform hover:scale-110">
                            ✏️ Edit
                        </a>
                        <button onclick="confirmDelete('{{ route('superuser.daftarPengguna.destroy', $user->user_id) }}')"
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
            text: "Pengguna ini akan dihapus secara permanen!",
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
