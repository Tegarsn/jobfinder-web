<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\jasa;

class codeprogramingController extends Controller
{
    public function view() {
    if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
    $email = auth()->user()->email; // Dapatkan email pengguna yang login
    // Ambil data freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();
    // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
    return view('catalog.codeprograming', ['freelancerStatus' => $freelancer->status ?? null]);
    }

    public function WebsiteDevelopment() {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silahkan Login Terlebih Dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Website Development')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('codeprograming.WebsiteDevelopment', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }
    
    public function MobileDevelopment(){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silahkan Login Terlebih Dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Mobile Development')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('codeprograming.MobileDevelopment', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function AIDevelopment(){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlbih Dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'AI Development')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('codeprograming.AIDevelopment', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function CyberSecurity(){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih Dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Cybersecurity')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('codeprograming.Cybersecurity', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function GameDevelopment(){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Game Development')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('codeprograming.GameDevelopment', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }
}
