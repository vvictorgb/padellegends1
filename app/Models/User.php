<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'movil',
        'direccion',
        'sexo',
        'lado',
        'nivel',
        'racha_victorias',
        'puntos',
        'victorias',
        'derrotas',
    ];

    /**
     * Atributos ocultos para arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atributos que deben castearse.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con partidas (many-to-many).
     */
    public function partidas()
    {
        return $this->belongsToMany(Partida::class)
                    ->withPivot('resultado')
                    ->withTimestamps();
    }
}
