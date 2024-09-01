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
        Schema::create('progreso_dos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('personaje_pregunta_id');
            $table->foreign('personaje_pregunta_id')->references('id')->on('p_preguntas')->onDelete('cascade');
            $table->boolean('completado')->default(0)->comment('0: No, 1: Sí');
            $table->tinyInteger('intentos')->default(0)->unsigned()->comment('Hasta 3 intentos permitidos');
            $table->tinyInteger('puntuacion')->default(0)->unsigned()->comment('Puntuación máxima de 100');
            $table->tinyInteger('estado_proceso')->default(1)->comment('0: En proceso, 1: Aprobado');
            $table->string('texto_respuesta_preguntas')->comment('Texto respuesta de la persona pregunta');
            $table->string('texto_respuesta_respuestas')->comment('Texto respuesta de la persona respuesta');
            $table->boolean('status_final_respuesta')->default(0)->comment('0: Incorrecto, 1: Correcto');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('nivel_id_pregunta')->nullable()->comment('ID del nivel asociado a la pregunta');
            $table->unsignedBigInteger('escena_id_pregunta')->nullable()->comment('ID de la escena asociada a la pregunta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progreso_dos_usuarios');
    }
};
