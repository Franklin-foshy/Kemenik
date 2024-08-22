<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progreso_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('nivel_id');
            $table->boolean('completado')->default(0);
            $table->tinyInteger('intentos')->default(0)->unsigned()->comment('Hasta 3 intentos permitidos');
            $table->tinyInteger('puntuacion')->default(0)->unsigned()->comment('Puntuación máxima de 100');
            $table->tinyInteger('estado_proceso')->default(1)->comment('1: En proceso, 2: Aprobado');
            $table->boolean('status')->default(1);
            $table->timestamps();

            // Foreign keys
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nivel_id')->references('id')->on('nivels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progreso_usuarios');
    }
};
