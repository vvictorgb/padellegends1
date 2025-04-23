<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FranjaHoraria;

class FranjaHorariasTableSeeder extends Seeder
{
    public function run(): void
    {
        $horas = [
            ['09:00:00', '10:30:00'],
            ['10:30:00', '12:00:00'],
            ['12:00:00', '13:30:00'],
            ['13:30:00', '15:00:00'],
            ['15:00:00', '16:30:00'],
            ['16:30:00', '18:00:00'],
            ['18:00:00', '19:30:00'],
            ['19:30:00', '21:00:00'],
            ['21:00:00', '22:30:00'],
        ];

        foreach ($horas as $h) {
            FranjaHoraria::create([
                'hora_inicio' => $h[0],
                'hora_fin' => $h[1],
            ]);
        }
    }
}
