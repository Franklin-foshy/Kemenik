<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = 'respuestas';
    protected $fillable = ['pregunta_id','texto_respuesta','imagen','status'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
