<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Nim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nims = Nim::all()->shuffle();

        $data = ['Risu', 'Yudas'];

        foreach ($data as $index => $nama) {
            Mahasiswa::create([
                'nama_mahasiswa' => $nama,
                'nim_id' => $nims[$index]->id
            ]);
        }
    }
}
