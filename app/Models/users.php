<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = "users";
    protected $id_user = "id_user";
    protected $fillable = ["id_user", "name", "email", "password"];
}
