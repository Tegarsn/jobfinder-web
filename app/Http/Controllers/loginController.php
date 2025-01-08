<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;  // Gunakan model 'User' yang benar

class loginController extends Controller
{
    public function formlogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        // Jika validasi gagal, kembali ke halaman login dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Coba login dengan data yang diberikan
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            // Jika login berhasil, redirect ke halaman dashboard atau halaman lain
            return redirect()->intended('landing');
        }
        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }
    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
