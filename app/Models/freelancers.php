<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelancers extends Model
{
    use HasFactory;
    protected $table = 'freelancers';
    protected $fillable = ['id',
        'nama', 'email','tanggal_lahir', 'gender', 'alamat', 'kota', 'kode_pos', 'skill', 'telepon', 'foto_ktp', 'status'
    ];
}
