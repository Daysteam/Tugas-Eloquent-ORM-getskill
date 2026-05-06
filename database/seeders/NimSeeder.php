<?php

namespace Database\Seeders;

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
        Nim::create([
            'no_nim' => '123456'
        ]);

        Nim::create([
            'no_nim' => '749276'
        ]);
    }
}
