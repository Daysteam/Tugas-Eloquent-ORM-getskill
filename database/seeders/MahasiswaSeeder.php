<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Risu', 'Yudas'];

        foreach ($data as $nama) {
            Mahasiswa::create([
                'nama_mahasiswa' => $nama,
            ]);
        }
    }
}
