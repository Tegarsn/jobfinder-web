<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongans';
    protected $fillable = [
        'nama',
        'perusahaan',
        'deskripsi',
        'kategori',
        'posisi',
        'gaji',
        'kota',
        'alamat',
        'gambar',
    ];
}

