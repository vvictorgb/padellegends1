<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Partida;

class PartidaAbierta extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $partida;

    public function __construct(Partida $partida)
    {
        $this->partida = $partida;
    }

    public function build()
    {
        return $this->subject('🆕 ¡Nueva partida abierta en tu nivel!')
                    ->view('emails.partida_abierta');
    }
}
