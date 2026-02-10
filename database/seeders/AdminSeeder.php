<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed admin awal.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',           // nama admin
            'email' => 'admin@perpus.com',     // email login
            'password' => Hash::make('123456'), // password default
        ]);
    }
}
