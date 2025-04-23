<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jugador 1',
            'email' => 'vgbalaguer@minsait.com',
            'password' => Hash::make('password'),
            'movil' => '600111222',
            'direccion' => 'Calle Padel 1',
            'sexo' => 'masculino',
            'lado' => 'derecha',
            'nivel' => 2.5,
            'racha_victorias' => 0,
            'puntos' => 50,
            'victorias' => 0,
            'derrotas' => 0,
        ]);

        User::create([
            'name' => 'Jugador 2',
            'email' => 'vgomezbalaguer@gmail.com',
            'password' => Hash::make('password'),
            'movil' => '600333444',
            'direccion' => 'Calle Padel 2',
            'sexo' => 'femenino',
            'lado' => 'reves',
            'nivel' => 2.5,
            'racha_victorias' => 0,
            'puntos' => 50,
            'victorias' => 0,
            'derrotas' => 0,
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'movil' => '600333443',
            'direccion' => 'Calle Padel 3',
            'sexo' => 'femenino',
            'lado' => 'reves',
            'nivel' => 2.5,
            'racha_victorias' => 0,
            'puntos' => 50,
            'victorias' => 0,
            'derrotas' => 0,
            'rol' => 'admin'
        ]);
    }
}
