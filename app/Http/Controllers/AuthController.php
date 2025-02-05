<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Proses login pengguna.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_nama' => 'required',
            'user_pass' => 'required',
        ]);

        // Cari pengguna berdasarkan username
        $user = User::where('user_nama', $request->user_nama)->first();

        // Verifikasi password
        if ($user && Hash::check($request->user_pass, $user->user_pass)) {
            // Autentikasi pengguna
            Auth::login($user);

            // Redirect ke halaman dashboard
            return redirect()->route('superuser.dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal
        return back()->withErrors(['user_nama' => 'Nama pengguna atau password salah.'])->withInput();
    }

    /**
     * Logout pengguna.
     */
    public function logout()
    {
        Auth::logout();

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}

