<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\freelancers;
use App\Models\order;
use App\Models\wallet;
use Illuminate\Support\Facades\Auth;

class freelanceController extends Controller
{
    public function Dashboardfreelance(){
        // Ambil data user yang sedang login
       // Ambil data user yang sedang login
       $user = Auth::user();
        
       // Cek jika user yang login adalah freelancer (berdasarkan email)
       $freelancer = freelancers::where('email', $user->email)->first();
       
       if ($freelancer) {
        // Ambil data order berdasarkan alur relasi
        $orders = Order::join('jasa', 'order.id_jasa', '=', 'jasa.id') // Gabung dengan tabel jasa
            ->join('freelancers', 'jasa.user_id', '=', 'freelancers.id') // Gabung dengan tabel freelancers
            ->where('freelancers.id', $freelancer->id) // Filter berdasarkan freelancer yang login
            ->select(
                
                'order.nama_user',
                'order.email',
                'order.phone',
                'order.deskripsi_order',
                'order.metode_pembayaran',
                'order.status_pembayaran',
                'order.status_order',
                'jasa.nama_jasa',
                'jasa.harga_jasa',
                'order.created_at'
            ) // Pilih kolom yang diperlukan
            ->get();
            // Ambil data order dan jasa yang relevan

            return view('Dashboardfreelance', compact('orders', 'user'));
        };

    }


    // Fungsi gawe nampilno landing seng anyar jang
    public function checkFreelancerStatus()
    { 
        if (!auth()->check()) {
            return redirect()->route('formlogin')->with('error', 'Silakan login terlebih dahulu.');
        }
    $email = auth()->user()->email; // Dapatkan email pengguna yang login

    // Ambil data freelancer berdasarkan email
    $freelancer = DB::table('freelancers')->where('email', $email)->first();

    // Kirim status ke view (gunakan 'null' jika tidak ditemukan)
    return view('landing', ['freelancerStatus' => $freelancer->status ?? null]);
}
    
public function orderuser()
{
    // Ambil data user yang sedang login
    $user = Auth::user();

    // Ambil data order berdasarkan user yang login
    $orders = Order::where('id_user', $user->id_user) // Filter berdasarkan user yang login
        ->select(
            'nama_user',
            'email',
            'phone',
            'deskripsi_order',
            'metode_pembayaran',
            'status_pembayaran',
            'status_order',
            'id_jasa',
            'created_at'
        )
        ->get();

    return view('order.orderuser', compact('orders', 'user'));
}


}








