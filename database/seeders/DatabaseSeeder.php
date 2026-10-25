<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin (sama dengan kredensial di proyek HTML asli).
        User::updateOrCreate(['username' => 'admin'], [
            'name' => 'Administrator',
            'email' => 'admin@tougar.com',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        User::updateOrCreate(['username' => 'tougar'], [
            'name' => 'Admin TOUGAR',
            'email' => 'tougar@tougar.com',
            'password' => 'tougar2025',
            'is_admin' => true,
        ]);
    }
}
