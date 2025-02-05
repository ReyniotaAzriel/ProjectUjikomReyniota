<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'tm_user'; // Nama tabel
    protected $primaryKey = 'user_id'; // Primary key tabel
    public $incrementing = false; // Jika primary key tidak auto increment
    protected $keyType = 'string'; // Tipe primary key (string)

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_pass',
        'user_hak',
        'user_sts',
    ];

    protected $hidden = [
        'user_pass',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
