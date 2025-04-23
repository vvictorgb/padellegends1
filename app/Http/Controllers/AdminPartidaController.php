<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\User;

class AdminPartidaController extends Controller
{
    public function __construct()
{
    $this->middleware(['auth', 'roles:admin']);
}

    public function index()
    {
        // Mostrar solo partidas completas SIN resultado aún
        $partidas = Partida::with(['users', 'pista', 'franja'])
            ->where('completa', true)
            ->whereDoesntHave('users', function ($query) {
                $query->whereNotNull('partida_user.resultado');
            })
            ->get();

        return view('admin.partidas', compact('partidas'));
    }

    public function marcarResultado(Request $request)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'ganadores' => 'required|array|size:2',
            'perdedores' => 'required|array|size:2',
        ]);

        $ganadores = $request->input('ganadores');
        $perdedores = $request->input('perdedores');
        $partida = Partida::findOrFail($request->input('partida_id'));

        // GANADORES
        foreach ($ganadores as $id) {
            $user = User::find($id);
            $user->victorias++;
            $user->racha_victorias++;
            $user->puntos += 20;

            // Límite de nivel: máximo 7
            if ($user->puntos >= 100) {
                if ($user->nivel < 7) {
                    $user->nivel += 0.25;
                    $user->puntos = 50;
                } else {
                    $user->puntos = 100;
                }
            }

            $user->save();
            $partida->users()->updateExistingPivot($id, ['resultado' => 'win']);
        }

        // PERDEDORES
        foreach ($perdedores as $id) {
            $user = User::find($id);
            $user->derrotas++;
            $user->racha_victorias = 0;
            $user->puntos -= 20;

            // Límite de nivel: mínimo 2.5
            if ($user->puntos <= 0) {
                if ($user->nivel > 2.5) {
                    $user->nivel -= 0.25;
                    $user->puntos = 50;
                } else {
                    $user->puntos = 0;
                }
            }

            $user->save();
            $partida->users()->updateExistingPivot($id, ['resultado' => 'lose']);
        }

        return redirect()->route('admin.partidas')->with('success', 'Resultado registrado correctamente.');
    }
}
