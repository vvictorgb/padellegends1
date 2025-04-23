<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partida_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('partida_id')
                  ->constrained('partidas')
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->enum('resultado', ['win', 'lose'])->nullable(); // se rellena al finalizar la partida

            $table->timestamps();

            $table->unique(['partida_id', 'user_id'], 'partida_user_unico');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partida_user');
    }
};
