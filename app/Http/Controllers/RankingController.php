<?php

namespace App\Http\Controllers;

use App\Models\User;

class RankingController extends Controller
{
    public function index()
    {
        $niveles = collect();

        for ($nivel = 7.0; $nivel >= 2.5; $nivel -= 0.25) {
            $nivel = round($nivel, 2);

            $usuarios = User::where('nivel', $nivel)
                ->orderByDesc('puntos')
                ->orderBy('name')
                ->get();

            $niveles->push([
                'nivel' => $nivel,
                'usuarios' => $usuarios
            ]);
        }

        return view('ranking', compact('niveles'));
    }

}
