<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PenggunaSeeder::class,
            GroupSeeder::class,
            PenggunaGroupSeeder::class,
            PembeliSeeder::class,
            BarangSeeder::class,
            MahasiswaSeeder::class,
            NimSeeder::class,
        ]);
    }
}
