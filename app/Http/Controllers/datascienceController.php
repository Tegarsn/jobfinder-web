<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class datascienceController extends Controller
{
    public function view() {
        if (!auth()->check()) {
                return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
            }
        $email = auth()->user()->email; // Dapatkan email pengguna yang login
        // Ambil data freelancer berdasarkan email
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
        return view('catalog.datascience', ['freelancerStatus' => $freelancer->status ?? null]);
        }
}
