<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        Anggota::insert([
            [
                'nisn' => '1234567890',
                'nama' => 'Ahmad Fauzi',
                'kelas' => '10A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '1234567891',
                'nama' => 'Rina Sari',
                'kelas' => '10B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '1234567892',
                'nama' => 'Budi Santoso',
                'kelas' => '11A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '1234567893',
                'nama' => 'Dewi Lestari',
                'kelas' => '11B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '1234567894',
                'nama' => 'Fajar Pratama',
                'kelas' => '12A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
