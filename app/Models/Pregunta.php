<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';
    protected $fillable = ['nivel_id','texto_pregunta','texto_respuesta','status'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
