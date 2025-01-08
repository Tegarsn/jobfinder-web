<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table ='order';
    protected $fillable = ['id_order', 'id_jasa', 'id_user', 'nama_user', 'email', 'phone', 'deskripsi_order', 'metode_pembayaran',
    'status_pemabayaran', 'status_order'];
}
