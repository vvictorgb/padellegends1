<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Partida;

class PartidaCerrada extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $partida;

    public function __construct(Partida $partida)
    {
        $this->partida = $partida;
    }

    public function build()
    {
        return $this->subject('🎾 ¡Tu partida está confirmada!')
                    ->view('emails.partida_cerrada');
    }
}
