<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Nim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = Mahasiswa::all();
        $index = 0;

        Nim::create([
            'no_nim' => '123456',
            'mahasiswa_id' => $mahasiswas[$index++]->id
        ]);

        Nim::create([
            'no_nim' => '749276',
            'mahasiswa_id' => $mahasiswas[$index]->id
        ]);
    }
}
