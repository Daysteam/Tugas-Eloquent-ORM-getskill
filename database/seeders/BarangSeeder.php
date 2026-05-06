<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelis = Pembeli::all();

        $data = ['Wajan', 'Panci', 'Wortel'];

        foreach ($data as $nama) {
            Barang::create([
                'nama_barang' => $nama,
                'pembeli_id' => $pembelis->random()->id
            ]);
        }
    }
}
