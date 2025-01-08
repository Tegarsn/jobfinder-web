<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jasa extends Model   
{
    use HasFactory;

    protected $table = 'jasa';

    protected $fillable = [
        'user_id',
        'nama_jasa',
        'kategori_jasa',
        'sub_kategorijasa',
        'harga_jasa',
        'deskripsi_jasa',
        'gambar_jasa',
    ];
}
