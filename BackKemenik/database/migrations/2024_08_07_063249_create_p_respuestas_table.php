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
        Schema::create('p_respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppregunta_id')->constrained('p_preguntas')->onDelete('cascade');
            $table->string('nombre');
            $table->string('texto_respuesta');
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_respuestas');
    }
};
