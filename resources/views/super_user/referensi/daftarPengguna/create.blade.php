@extends('layout.su')

@section('content')
<div class="max-w-3xl mx-auto bg-gradient-to-br from-indigo-50 to-white p-10 rounded-xl shadow-2xl mt-10">
    <h2 class="text-4xl font-extrabold text-indigo-800 text-center mb-8 tracking-wide">Tambah Pengguna</h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500 text-white rounded-lg shadow-md">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('superuser.daftarPengguna.store') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-6">
            <label class="block text-gray-800 font-semibold mb-2">Nama Pengguna</label>
            <input type="text" name="user_nama" placeholder="Masukkan Nama" class="w-full px-5 py-3 border-2 border-indigo-300 rounded-lg focus:ring-4 focus:ring-indigo-200 transition duration-300 outline-none shadow-sm" required>
            @error('user_nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label class="block text-gray-800 font-semibold mb-2">Password</label>
            <input type="password" name="user_pass" placeholder="Masukkan Password" class="w-full px-5 py-3 border-2 border-indigo-300 rounded-lg focus:ring-4 focus:ring-indigo-200 transition duration-300 outline-none shadow-sm" required>
            @error('user_pass') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Hak Akses -->
        <div class="mb-6">
            <label class="block text-gray-800 font-semibold mb-2">Hak Akses</label>
            <select name="user_hak" class="w-full px-5 py-3 border-2 border-indigo-300 rounded-lg bg-white shadow-sm focus:ring-4 focus:ring-indigo-200 transition duration-300 outline-none" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('user_hak') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Status -->
        <div class="mb-8">
            <label class="block text-gray-800 font-semibold mb-2">Status</label>
            <div class="flex space-x-4">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="user_sts" value="1" class="form-radio text-indigo-500 focus:ring-indigo-300" required>
                    <span class="text-gray-700">Aktif</span>
                </label>
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="user_sts" value="0" class="form-radio text-indigo-500 focus:ring-indigo-300">
                    <span class="text-gray-700">Nonaktif</span>
                </label>
            </div>
            @error('user_sts') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('superuser.daftarPengguna.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                🔙 Kembali
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                ✅ Simpan
            </button>
        </div>
    </form>
</div>
@endsection
