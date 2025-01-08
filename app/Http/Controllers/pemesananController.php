<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\jasa;
use App\Models\order;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pemesananController extends Controller
{
    public function viewpemesanan(){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
    $email = auth()->user()->email; // Dapatkan email pengguna yang login
    // Ambil data freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();
    // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
    return view('order.pemesanan', ['freelancerStatus' => $freelancer->status ?? null]);
    }

    public function checkout($id){
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
        $formjasa = DB::table('jasa')
        ->join('freelancers', 'jasa.user_id', '=', 'freelancers.id')
        ->join('users', 'freelancers.email', '=', 'users.email')
        ->where('jasa.id', $id) // Sesuaikan dengan ID jasa
        ->select('jasa.*', 'users.name as user_name', 'freelancers.email as freelancers_email',
        'freelancers.created_at as freelancers_created_at', 'freelancers.skill as freelancers_skill' ) // Ambil kolom user_name
        ->first(); // Ambil satu baris data
        $getjasa = jasa::findOrFail($id);
        $email = auth()->user()->email;
        $freelancer = DB::table('freelancers')->where('email', $email)->first();
        return view('order.checkout', ['freelancerStatus' => $freelancer->status ?? null, 
        'getjasa' => $getjasa,
        'formjasa' => $formjasa,
    ]);
    }
    public function store(Request $request, $id) {
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
        $request->validate([
        'nama_user' => 'required|string|max:40',
        'email' => 'required|email|max:30',
        'phone' => 'required|string|max:20',
        'deskripsi_order' => 'required|string|max:900',
        'metode_pembayaran' => 'required|string',
        ]);

        $jasa = jasa::findOrFail($id);
        // $user = auth()->user();
        $id = auth()->user()->id_user;
        $user = DB::table('users')->where('id_user', $id)->first();
        // $user = users::where('email', Auth::user()->email)->first();

    // Simpan data order
        order::create([
        'id_jasa' => $jasa->id,
        'id_user' => $user->id_user,
        'nama_user' => $request->nama_user,
        'email' => $request->email,
        'phone' => $request->phone,
        'deskripsi_order' => $request->deskripsi_order,
        'metode_pembayaran' => $request->metode_pembayaran,
        'status_pembayaran' => 'pending',
        'status_order' => 'pengajuan',
    ]);
    return redirect()->back()->with('success', 'Jasa berhasil diupload!');
       }
       
}
