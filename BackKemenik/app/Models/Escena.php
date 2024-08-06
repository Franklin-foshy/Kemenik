<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escena extends Model
{
    use HasFactory;

    protected $table = 'escenas';
    protected $fillable = ['descripcion','nivel_id','status'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
}
