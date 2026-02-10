<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;


    protected $table = 'peminjaman';
    protected $fillable = [
        'anggota_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke anggota
    public function anggota()
{
    return $this->belongsTo(Anggota::class, 'anggota_id');
}

public function buku()
{
    return $this->belongsToMany(Buku::class, 'detail_peminjaman')
                ->withPivot('jumlah')
                ->withTimestamps();
}

public function detailPeminjaman()
{
    return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id');
}

}
