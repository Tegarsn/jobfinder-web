<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\freelancers;
use App\Models\jasa;
use Illuminate\Support\Facades\Auth;

class GraphicDesigncontroller extends Controller
{
    public function view(){
        return view('catalog.graphicdesign');
    }

    public function view1(){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
    $email = auth()->user()->email; // Dapatkan email pengguna yang login
    // Ambil data freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();
    // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
    return view('catalog.graphicdesign', ['freelancerStatus' => $freelancer->status ?? null]);
    }

    public function logo(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu.');
    }

    $email = auth()->user()->email;
    $user = auth()->user();
    
    // Ambil freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();
    
    // Query dengan join antara jasa, freelancers, dan users
    $getjasa = DB::table('jasa')
        ->join('freelancers', 'jasa.user_id', '=', 'freelancers.id')
        ->join('users', 'freelancers.email', '=', 'users.email')
        ->where('jasa.sub_kategorijasa', 'Logo And Brand Design')
        ->select('jasa.*', 'users.name as user_name') // Ambil kolom nama dari tabel users
        ->get();

    return view('graphicdesign.logo', [
        'freelancerStatus' => $freelancer->status ?? null,
        'getjasa' => $getjasa,
        'user' => $user, // Kirim data pengguna ke view
    ]);
}


    public function arsitektur(Request $request) {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Architecture Design')->get();
        $email = auth()->user()->email;
        $user = auth()->user();
        $freelancer = DB::table('freelancers')->where('email',$email)->first();
        return view('graphicdesign.arsitektur', ['freelancerStatus' => $freelancer->status ?? null,
        'getjasa' => $getjasa, 
        'user' => $user,
    ]);
    }

    public function designinterior(Request $request) {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silahkan Login terlebih dahulu.');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Design Interior')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email',$email)->first();
        return view('graphicdesign.designinterior', ['freelancerStatus' => $freelancer->status ?? null],compact('getjasa'));
    }

    public function webapp(Request $request) {
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login Terlebi Dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', 'Web And App Design')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('graphicdesign.webapp', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
        }
    
    public function dimensi(Request $request){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'Silahkan Login Terlebi Dahulu');
        }
        $getjasa = jasa::where('sub_kategorijasa', '3D Design')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('graphicdesign.3D', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function artillustrator(Request $request) {
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'SIlahkan login terlebih dahulu');
        }

        $getjasa = jasa::where('sub_kategorijasa', 'Art And Illustrator Design')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('graphicdesign.artilustrator', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function photoeditor(Request $request){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'SIlahkan login terlebih dahulu');
        }

        $getjasa = jasa::where('sub_kategorijasa', 'Photo Editor')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('graphicdesign.PhotoEditor', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    public function fashioneditor(Request $request){
        if (!auth()->check()){
            return redirect()->route('formlogin')->with('error', 'SIlahkan login terlebih dahulu');
        }

        $getjasa = jasa::where('sub_kategorijasa', 'Fashion Editor')->get();
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('graphicdesign.fashioneditor', ['freelancerStatus' => $freelancer->status ?? null], compact('getjasa'));
    }

    // FUnction untuk mengarahkan ke tampilan detail atau view
    public function ViewLogo($id)
    {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
        // Ambil data jasa berdasarkan ID
        $getjasa = jasa::findOrFail($id);
    
        // Query untuk mendapatkan nama user dari jasa terkait
        $getnama = DB::table('jasa')
            ->join('freelancers', 'jasa.user_id', '=', 'freelancers.id')
            ->join('users', 'freelancers.email', '=', 'users.email')
            ->where('jasa.id', $id) // Sesuaikan dengan ID jasa
            ->select('jasa.*', 'users.name as user_name', 'freelancers.email as freelancers_email',
            'freelancers.created_at as freelancers_created_at', 'freelancers.skill as freelancers_skill', ) // Ambil kolom user_name
            ->first(); // Ambil satu baris data
            $email = auth()->user()->email;
            $freelancer = DB::table('freelancers')->where('email', $email)->first();
        // Kirim data ke view
        return view('order.pemesanan', [ 'freelancerStatus' => $freelancer->status ?? null,
            'getjasa' => $getjasa,
            'getnama' => $getnama,
        ]);
    }
    
}
