<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    // Menampilkan halaman form tambah lowongan
    public function upload_lowongan()
    {
        return view('upload_lowongan');
    }

    // Menyimpan data lowongan ke database
    public function submit(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        // Menyimpan data lowongan ke database
        lowongan::create([
            'nama' => $validated['nama'],
            'perusahaan' => $validated['perusahaan'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'posisi' => $validated['posisi'],
            'gaji' => $validated['gaji'],
            'kota' => $validated['kota'],
            'alamat' => $validated['alamat'],
            'gambar' => $gambarPath ?? null,
        ]);

        return redirect()->route('lowongan')->with('success', 'Lowongan pekerjaan berhasil ditambahkan!');
    }

    public function editLowongan($id) {
        $lowongan = Lowongan::findOrFail($id);
        return view('edit_lowongan', compact('lowongan'));
    }

    public function updateLowongan(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Perbarui data
        $lowongan->update([
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'posisi' => $request->posisi,
            'gaji' => $request->gaji,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
        ]);

        // Periksa jika ada gambar baru
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $lowongan->update(['gambar' => $gambarPath]);
        }

        return redirect()->route('lowongan')->with('success', 'Lowongan berhasil diperbarui.');
    }


    public function deleteLowongan($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('lowongan')->with('success', 'Lowongan berhasil dihapus.');
    }





}


