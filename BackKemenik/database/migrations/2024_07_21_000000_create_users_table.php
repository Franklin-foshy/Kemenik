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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('telefono')->unique();
            $table->string('email')->nullable();
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('pais_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('pais_id')
                ->references('id')->on('paiss')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('departamento_id')
                ->references('id')->on('departamentos')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('municipio_id')
                ->references('id')->on('municipios')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->text('sexo');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')->on('rols')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('comunidad')->nullable();
            $table->string('etnia');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->smallInteger('status');
            $table->integer('user_id');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
