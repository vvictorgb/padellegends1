<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pista;

class PistasTableSeeder extends Seeder
{
    public function run(): void
    {
        $nombres = ['Pista 1', 'Pista 2', 'Pista 3', 'Pista 4', 'Pista 5'];

        foreach ($nombres as $nombre) {
            Pista::create(['nombre' => $nombre]);
        }
    }
}

