<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function partidas()
    {
        return $this->hasMany(Partida::class);
    }
}
