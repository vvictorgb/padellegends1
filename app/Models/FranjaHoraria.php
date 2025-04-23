<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FranjaHoraria extends Model
{
    use HasFactory;

    protected $table = 'franja_horarias'; // <- nombre exacto en BBDD
    protected $fillable = ['hora_inicio', 'hora_fin'];

    public function partidas()
    {
        return $this->hasMany(Partida::class, 'franja_horaria_id');
    }
}
