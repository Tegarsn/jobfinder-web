<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\freelancers;
use App\Models\jasa;

class digitalmarketingController extends Controller
{
    public function view(){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
    $email = auth()->user()->email; // Dapatkan email pengguna yang login
    // Ambil data freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();
    // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
    return view('catalog.digitalmarketing', ['freelancerStatus' => $freelancer->status ?? null]);
    }

    public function Ecommerce(Request $request){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Ecommerce Marketing')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.EcommerceMarketing', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa')); 
    }

    public function Affiliate(Request $request) {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Affiliate Marketing')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.AffiliateMarketing', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function PaidSosial(){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Paid Social Media')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.PaidSosial', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function MarketingStrategy(){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Marketing Strategy')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.MarketingStrategy', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function SEO(){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Search Engine Optimization')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.SEO', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function ContentMarketing(){
        if (!auth()->check()){
            return redirect()->route('sub_kategorijasa', 'Content Marketing');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Content Marketing')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.ContentMarketing', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function AnalyticsAndTracking(){
        if (!auth()->check()){
            return redirect()->route('sub_kategorijasa', 'Content Marketing');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Analytics And Tracking')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.AnalyticsAndTracking', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function ProgrammaticAdvertising(){
        if (!auth()->check()){
            return redirect()->route('sub_kategorijasa', 'Content Marketing');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Programmatic Advertising')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('digitalmarketing.ProgrammaticAdvertising', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }
}
