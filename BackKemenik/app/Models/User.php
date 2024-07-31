<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'telefono', 'email', 'fecha_nacimiento', 'pais_id', 'departamento_id', 'municipio_id', 'sexo', 'role_id', 'permissions', 'email_verified_at', 'password', 'status', 'user_id', 'remember_token'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rol()
    {
        return $this->hasOne(Rol::class, 'id', 'role_id');
    }

    public function pais()
    {
        return $this->hasOne(Pais::class, 'id', 'pais_id');
    }

    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'id', 'departamento_id');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id', 'municipio_id');
    }
}
