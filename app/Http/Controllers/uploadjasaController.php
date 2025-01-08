<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\jasa;
use App\Models\freelancers;

class uploadjasaController extends Controller
{
    public function formuploadjasa(){
        return view('uploadjasa');
    }

    public function store(Request $request){
        $request->validate([
            'nama_jasa' => 'required|string|max:255',
            'kategori_jasa' => 'required|string|max:255',
            'sub_kategorijasa' => 'required|string|max:255',
            'harga_jasa' => 'required|integer',
            'deskripsi_jasa' => 'required|string|max:255',
            'gambar_jasa' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $freelancer = freelancers::where('email', Auth::user()->email)->first();
        if (!$freelancer) {
            return redirect()->back()->withErrors('Freelancer tidak ditemukan.');
        }
        $gambarpath = $request->file('gambar_jasa')->store('upload_jasa', 'public');

        jasa::create([
            'user_id' => $freelancer->id,
            'nama_jasa' => $request->nama_jasa,
            'kategori_jasa' => $request->kategori_jasa,
            'sub_kategorijasa' => $request->sub_kategorijasa,
            'harga_jasa' => $request->harga_jasa,
            'deskripsi_jasa' => $request->deskripsi_jasa,
            'gambar_jasa' => $gambarpath,
        ]);

        return redirect()->back()->with('success', 'Jasa berhasil diupload!');
    }

    public function graphicdesign(){
        return view('graphicdesign');
    }
}
