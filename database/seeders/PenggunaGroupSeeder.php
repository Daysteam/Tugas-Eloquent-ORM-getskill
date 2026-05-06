<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengguna = Pengguna::all();

        $group = Group::all();

        foreach ($group as $g){
            $g->pengguna()->attach(
                $pengguna->random(2)->pluck('id')->toArray()
            );
        }
    }
}
