<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRespuesta extends Model
{
    use HasFactory;

    protected $table = 'p_respuestas';
    protected $fillable = ['ppregunta_id', 'nombre', 'texto_respuesta', 'status'];

    public function ppregunta()
    {
        return $this->belongsTo(PPregunta::class);
    }
}
