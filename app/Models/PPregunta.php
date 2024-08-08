<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPregunta extends Model
{
    use HasFactory;

    protected $table = 'p_preguntas';
    protected $fillable = ['nivel_id', 'escena_id', 'nombre', 'texto_pregunta', 'texto_respuesta', 'status'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function escena()
    {
        return $this->belongsTo(Escena::class);
    }

    public function prespuestas()
    {
        return $this->hasMany(PRespuesta::class);
    }
}
