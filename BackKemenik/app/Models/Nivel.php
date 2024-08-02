<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'nivels';
    protected $fillable = ['name', 'descripcion', 'imagen','status'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function rompecabezas()
    {
        return $this->hasMany(Rompecabeza::class);
    }
}
