<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Kategori;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kategori
        $kategori = Kategori::all();

        if($kategori->count() == 0){
            $this->command->info('Seeder kategori harus dijalankan dulu!');
            return;
        }

        Buku::insert([
            [
                'judul' => 'Harry Potter dan Batu Bertuah',
                'pengarang' => 'J.K. Rowling',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2001,
                'kategori_id' => $kategori->where('nama','Fiksi')->first()->id,
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Kamus Bahasa Indonesia',
                'pengarang' => 'Tim Kamus',
                'penerbit' => 'Kemdikbud',
                'tahun_terbit' => 2018,
                'kategori_id' => $kategori->where('nama','Non-Fiksi')->first()->id,
                'jumlah' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Fisika Dasar',
                'pengarang' => 'Albert Einstein',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => 2005,
                'kategori_id' => $kategori->where('nama','Sains')->first()->id,
                'jumlah' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Sejarah Indonesia Modern',
                'pengarang' => 'John Doe',
                'penerbit' => 'Pustaka Nusantara',
                'tahun_terbit' => 2010,
                'kategori_id' => $kategori->where('nama','Sejarah')->first()->id,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
