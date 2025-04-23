<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
use App\Models\Partida;
use App\Models\FranjaHoraria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartidaAbierta;
use App\Mail\PartidaCerrada;

class ReservaController extends Controller
{
    public function index()
    {
        return view('reservas.index');
    }

    public function reservasPorDia(Request $request)
    {
        $fecha = $request->input('fecha');

        $yaExisten = Partida::whereDate('fecha', $fecha)->exists();

        if (!$yaExisten) {
            $pistas = Pista::all();
            $franjas = FranjaHoraria::all();

            foreach ($pistas as $pista) {
                foreach ($franjas as $franja) {
                    Partida::create([
                        'pista_id' => $pista->id,
                        'franja_horaria_id' => $franja->id,
                        'fecha' => $fecha,
                        'completa' => false,
                        'reservada_entera' => false,
                    ]);
                }
            }
        }

        $pistas = Pista::with(['partidas' => function ($query) use ($fecha) {
            $query->whereDate('fecha', $fecha)
                  ->with('users', 'franja')
                  ->orderBy('franja_horaria_id');
        }])->get();

        return response()->json([
            'pistas' => $pistas
        ]);
    }

    public function unirseAPartida(Request $request)
    {
        $partidaId = $request->input('partida_id');
        $user = Auth::user();

        $partida = Partida::with(['users', 'pista', 'franja'])->findOrFail($partidaId);

        if ($partida->completa || $partida->reservada_entera) {
            return response()->json(['error' => 'Partida cerrada'], 400);
        }

        if ($partida->users->contains($user->id)) {
            return response()->json(['error' => 'Ya estás en la partida'], 400);
        }

        if ($partida->users->count() >= 4) {
            return response()->json(['error' => 'La partida está llena'], 400);
        }

        if ($partida->users->count() > 0) {
            $nivelRef = $partida->users->first()->nivel;
            if ($user->nivel != $nivelRef) {
                return response()->json(['error' => 'Tu nivel no coincide'], 400);
            }
        }

        $eraVacia = $partida->users->count() === 0;

        $partida->users()->attach($user->id);

        // ✅ Si se completa, marcar y enviar email
        if ($partida->users()->count() >= 4) {
            $partida->update(['completa' => true]);

            // ✅ Enviar email a los 4 jugadores
            $jugadores = $partida->users;
            foreach ($jugadores as $jugador) {
                Mail::to($jugador->email)->queue(new PartidaCerrada($partida));
            }
        }

        // ✅ Enviar email si era la primera vez que alguien se unía
        if ($eraVacia) {
            $nivel = $user->nivel;
            $otrosJugadores = \App\Models\User::where('nivel', $nivel)
                ->where('id', '!=', $user->id)
                ->whereNotNull('email')
                ->get();

            foreach ($otrosJugadores as $destinatario) {
                Mail::to($destinatario->email)->queue(new PartidaAbierta($partida));
            }
        }

        return response()->json(['success' => 'Te has unido a la partida']);
    }

    public function reservarEntera(Request $request)
    {
        $partidaId = $request->input('partida_id');
        $user = Auth::user();

        $partida = Partida::with('users')->findOrFail($partidaId);

        if ($partida->completa || $partida->reservada_entera || $partida->users->count() > 0) {
            return response()->json(['error' => 'La pista ya está ocupada'], 400);
        }

        $partida->update([
            'reservada_entera' => true,
            'completa' => true,
        ]);

        $partida->users()->attach($user->id);

        return response()->json(['success' => 'Pista reservada completamente']);
    }
}
