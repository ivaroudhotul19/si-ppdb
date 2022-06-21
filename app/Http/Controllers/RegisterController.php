<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// untuk memanggil Hash pada saat enkripsi password
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }
    public function store (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'nip' => 'required|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // enkripsi password (hashing password)
        $validatedData['password'] = Hash::make($validatedData['password']);

        // buat masukin ke database
        User::create($validatedData);

        // kalau berhasil registrasi biar nggak keluar halaman kosong
        Alert::success('Registrasion successfull!', 'please login');
        return redirect('/');
    }
}
