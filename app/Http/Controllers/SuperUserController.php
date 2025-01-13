<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    public function index(){
        return view('super_user.dashboard');
    }

    public function jenisbarang(){
        return view('super_user.referensi.jenisBarang');
    }

    public function daftarPengguna(){
        return view('super_user.referensi.daftarPengguna');
    }
}
