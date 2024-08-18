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
        'nivel_id',
        'completado',
        'intentos',
        'puntuacion',
        'estado_proceso',
        'status',
    ];

    // Relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con el modelo Nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }
}
