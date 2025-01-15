<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
        'nama_jurusan',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'jurusan_id', 'id');
    }
}
