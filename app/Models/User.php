<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    protected $table = "users";  // Nama tabel tetap 'users'
    protected $primaryKey = "id_user";  // Primary key menggunakan 'id_user'
    public $incrementing = true;  // Jika id_user adalah auto-increment
    protected $keyType = 'int';  // Jika id_user adalah integer

    protected $fillable = ["id_user", "name", "email", "password"];

    public $timestamps = false;  // Nonaktifkan timestamps jika tidak ada created_at dan updated_at
}
