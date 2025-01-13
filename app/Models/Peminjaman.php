<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'tm_peminjaman';
    protected $primaryKey = 'pb_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pb_id',
        'user_id',
        'pb_tgl',
        'pb_no_siswa',
        'pb_nama_siswa',
        'pb_harus_kembali_tgl',
        'pb_stat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function peminjamanBarang()
    {
        return $this->hasMany(PeminjamanBarang::class, 'pb_id', 'pb_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'pb_id', 'pb_id');
    }
}
