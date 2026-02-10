<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama' => 'Fiksi', 'keterangan' => 'Buku cerita fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Non-Fiksi', 'keterangan' => 'Buku fakta dan referensi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sains', 'keterangan' => 'Buku tentang ilmu pengetahuan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sejarah', 'keterangan' => 'Buku sejarah dunia dan Indonesia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
