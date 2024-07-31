<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $fillable = ['name', 'pais_id', 'status'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
