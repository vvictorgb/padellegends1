<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: "Pista 1", "Pista 2"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pistas');
    }
};
