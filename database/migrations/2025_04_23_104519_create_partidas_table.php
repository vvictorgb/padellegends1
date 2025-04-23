<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();

            // Relación con pistas
            $table->foreignId('pista_id')
                  ->constrained('pistas')
                  ->onDelete('cascade');

            // Relación con franjas horarias
            $table->foreignId('franja_horaria_id')
                  ->constrained('franja_horarias')
                  ->onDelete('cascade');

            $table->date('fecha'); // día de la reserva

            $table->boolean('completa')->default(false);
            $table->boolean('reservada_entera')->default(false);

            $table->timestamps();

            // Para evitar duplicadas (misma pista, franja y día)
            $table->unique(['pista_id', 'franja_horaria_id', 'fecha'], 'partida_slot_unico');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};

