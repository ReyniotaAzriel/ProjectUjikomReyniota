@extends('layout.su')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-xl border border-gray-200">
        <h2 class="text-4xl font-extrabold text-indigo-700 text-center mb-6">Edit Pengguna</h2>

        <form action="{{ route('superuser.daftarPengguna.update', $user->user_id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-6">
                <label class="block text-gray-800 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="user_nama" value="{{ $user->user_nama }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition-all duration-200" required>
            </div>

            <!-- Hak Akses -->
            <div class="mb-6">
                <label class="block text-gray-800 font-semibold mb-2">Hak Akses</label>
                <select name="user_hak"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-400 transition-all duration-200" required>
                    <option value="admin" {{ $user->user_hak == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->user_hak == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block text-gray-800 font-semibold mb-2">Status Pengguna</label>
                <div class="flex space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="user_sts" value="1" {{ $user->user_sts == 1 ? 'checked' : '' }}
                               class="form-radio h-5 w-5 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-gray-700">Aktif</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="user_sts" value="0" {{ $user->user_sts == 0 ? 'checked' : '' }}
                               class="form-radio h-5 w-5 text-red-600 focus:ring-red-500">
                        <span class="text-gray-700">Nonaktif</span>
                    </label>
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('superuser.daftarPengguna.index') }}"
                   class="flex items-center bg-gray-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-500 transition duration-200">
                    🔙 Kembali
                </a>
                <button type="submit"
                        class="flex items-center bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
