<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Anggota extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'anggota';   
    protected $table = 'anggota'; 

    protected $fillable = [
        'nisn',
        'nama',
        'kelas',
        'alamat',
    ];

    // Relasi ke peminjaman
    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class, 'anggota_id');
}

}
