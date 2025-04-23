<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();


            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->string('movil')->nullable();
            $table->string('direccion')->nullable();
            $table->enum('sexo', ['masculino', 'femenino','otro'])->nullable();
            $table->enum('lado', ['derecha', 'reves'])->nullable();


            $table->float('nivel')->default(2.5);
            $table->integer('racha_victorias')->default(0);
            $table->integer('puntos')->default(50);

            $table->integer('victorias')->default(0);
            $table->integer('derrotas')->default(0);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
