<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KosSeeder::class,
        ]);

        // Admin user
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@koskita.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        // Pemilik kos (sample)
        User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@koskita.com',
            'password' => bcrypt('password'),
            'role'     => 'pemilik',
            'whatsapp' => '6281234567890',
        ]);

        // Pencari kos (sample)
        User::create([
            'name'     => 'Sari Wulandari',
            'email'    => 'sari@koskita.com',
            'password' => bcrypt('password'),
            'role'     => 'pencari',
        ]);
    }
}
