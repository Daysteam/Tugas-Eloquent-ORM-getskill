<?php

namespace Database\Seeders;

use App\Models\Pembeli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembeli::create([
            'nama_pembeli' => 'Rizal'
        ]);
    
        Pembeli::create([
            'nama_pembeli' => 'Polka'
        ]);
    }
}
