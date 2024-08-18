<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'nivels';
    protected $fillable = ['name', 'descripcion', 'imagen', 'status'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function rompecabezas()
    {
        return $this->hasMany(Rompecabeza::class);
    }

    public function escenas()
    {
        return $this->hasMany(Escena::class);
    }

    public function ppreguntas()
    {
        return $this->hasMany(PPregunta::class);
    }

    // Relación con el modelo ProgresoUsuario
    public function progresos()
    {
        return $this->hasMany(ProgresoUsuario::class, 'nivel_id');
    }
}
