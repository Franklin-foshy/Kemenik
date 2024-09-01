<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresoUsuario extends Model
{
    use HasFactory;

    // Define la tabla asociada al modelo (opcional si sigue la convención de nombres en plural)
    protected $table = 'progreso_usuarios';

    // Campos que se pueden llenar de manera masiva
    protected $fillable = [
        'usuario_id',
        'pregunta_id',
        'completado',
        'intentos',
        'puntuacion',
        'estado_proceso',
        'texto_respuesta_preguntas',
        'texto_respuesta_respuestas',
        'status_final_respuesta',
        'status',
        'nivel_id_pregunta',
    ];

    // Relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con el modelo Pregunta
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}
