<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\freelancers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class daftarFreelanceController extends Controller
{
    public  function formdaftar(Request $request)
    {
    $email = $request->user()->email; // Ambil email dari pengguna yang login
    $freelancerExists = DB::table('freelancers')->where('email', $email)->exists();

    if ($freelancerExists) {
        // Jika email sudah ada, arahkan ke halaman wait proses
        return redirect()->route('waitproses');
    }

    // Jika email belum ada, tampilkan halaman daftar freelancer
    return view('daftarfreelance');
    }
 

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => ['required', 'date', function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->age;
                    if ($age < 17) {
                        $fail('Anda harus berusia minimal 17 tahun.');
                    }
                }],
                'gender' => 'required|string',
                'alamat' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'kode_pos' => 'required|integer',
                'skill' => 'required|string',
                'telepon' => 'required|string',
                'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            $email = auth()->user()->email;
            $fotoKtpPath = $request->file('foto_ktp')->store('ktp_images', 'public');

            freelancers::create([
                'nama' => $request->input('nama'),
                'email' => $email,
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'gender' => $request->input('gender'),
                'alamat' => $request->input('alamat'),
                'kota' => $request->input('kota'),
                'kode_pos' => $request->input('kode_pos'),
                'skill' => $request->input('skill'),
                'telepon' => $request->input('telepon'),
                'foto_ktp' => $fotoKtpPath,
                'status' => 'pengajuan',
            ]);

            return redirect()->route('daftarfreelance')->with('success', 'Freelancer berhasil didaftarkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }
    }
    public function getfreelancer(Request $request)
    {
        $freelancers = freelancers::all();

        return view('datafreelancer', compact('freelancers'));
    }

    public function show($id)
    {
        $freelancer = freelancers::findOrFail($id);
        return view('viewfreelancer', compact('freelancer'));
    }

    public function destroy($id)
    {
        $freelancer = freelancers::find($id);

        if ($freelancer) {
            $freelancer->delete();
            return redirect()->route('datafreelancer')->with('success', 'Freelancer berhasil dihapus');
        } else {
            return redirect()->route('datafreelancer')->with('error', 'Freelancer tidak ditemukan');
        }
    }
    public function terima($id)
    {
        $freelancer = freelancers::find($id);
        if ($freelancer) {
            $freelancer->status = 'aktif';
            $freelancer->save();
            return redirect()->route('datafreelancer')->with('success', 'Freelancer berhasil diterima dan status diubah menjadi aktif');
        } else {
            return redirect()->route('datafreelancer')->with('error', 'Freelancer tidak ditemukan');
        }
    }

    public function wait(){
        return view('waitproses');
    }
}
