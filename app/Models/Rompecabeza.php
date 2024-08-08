<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rompecabeza extends Model
{
    use HasFactory;

    protected $table = 'rompecabezas';
    protected $fillable = ['name','nivel_id','status'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
}
