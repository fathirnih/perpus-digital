<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
     protected $table = 'buku';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kategori_id',
        'jumlah',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke detail peminjaman
    public function detailPeminjaman()
    {
        return $this->belongsToMany(Peminjaman::class, 'detail_peminjaman')
                ->withPivot('jumlah')
                ->withTimestamps();
    }
}
