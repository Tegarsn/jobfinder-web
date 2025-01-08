<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use HasFactory;
    protected $table = "wallet";
    protected $fillable = ['id_wallet', 'id_freelancer', 'bank_bca',
    'bank_bri', 'shopepay', 'dana'];
}
