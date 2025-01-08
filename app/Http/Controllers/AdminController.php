<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin');
    }

    public function freelancers()
    {
        return view('admin.freelancers');
    }

    public function leveragePositions()
    {
        return view('admin.leverage_positions');
    }

    public function lowongan()
    {
        // Ambil data lowongan dari database
        $lowongans = lowongan::all();

        // Kirimkan data ke view
        return view('admin.lowongan', compact('lowongans'));
    }

    public function upload_lowongan() {
        return view('admin.upload_lowongan');
    }

    public function accountPages()
    {
        return view('admin.account_pages');
    }

    public function progress()
    {
        return view('admin.progress');
    }
}
