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
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('completado')->default(0)->comment('0: No, 1: Sí');
            $table->tinyInteger('intentos')->default(0)->unsigned()->comment('Hasta 3 intentos permitidos');
            $table->tinyInteger('puntuacion')->default(0)->unsigned()->comment('Puntuación máxima de 100');
            $table->tinyInteger('estado_proceso')->default(1)->comment('1: En proceso, 2: Aprobado');
            $table->string('texto_respuesta_preguntas')->comment('Texto respuesta de la pregunta');
            $table->string('texto_respuesta_respuestas')->comment('Texto respuesta de la respuesta');
            $table->boolean('status_final_respuesta')->default(0)->comment('1: Correcto, 0: Incorrecto');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('nivel_id_pregunta')->nullable()->comment('ID del nivel asociado a la pregunta');
            $table->timestamps();
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
