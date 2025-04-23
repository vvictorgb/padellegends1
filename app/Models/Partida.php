<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partida extends Model
{
    use HasFactory;

    protected $fillable = [
        'pista_id',
        'franja_horaria_id',
        'fecha',
        'completa',
        'reservada_entera'
    ];

    public function pista()
    {
        return $this->belongsTo(Pista::class);
    }

    public function franja()
    {
        return $this->belongsTo(FranjaHoraria::class, 'franja_horaria_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('resultado')
                    ->withTimestamps();
    }
}
