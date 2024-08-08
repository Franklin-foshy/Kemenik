<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ronald Fuentes',
            'telefono' => 54657630,
            'email' => 'rdfuentes@gmail.com',
            'fecha_nacimiento' => '1996-02-15',
            'pais_id' => 185,
            'departamento_id' => 17,
            'municipio_id' => 259,
            'comunidad' => '',
            'etnia' => 'Ladino',
            'sexo' => 'Hombre',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('ontabebe'),
            'status' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Franklin Oxlaj',
            'telefono' => 36106865,
            'email' => 'foxlaj.77@gmail.com',
            'fecha_nacimiento' => '1998-12-12',
            'pais_id' => 185,
            'departamento_id' => 17,
            'municipio_id' => 259,
            'comunidad' => '',
            'etnia' => 'Ladino',
            'sexo' => 'Hombre',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'status' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([

            'name' => 'Daisy Miranda',
            'telefono' => 59426788,
            'email' => 'damiranda@gmail.com',
            'fecha_nacimiento' => '1996-06-01',
            'pais_id' => 185,
            'departamento_id' => 17,
            'municipio_id' => 259,
            'comunidad' => '',
            'etnia' => 'Ladino',
            'sexo' => 'Mujer',
            'role_id' => 2,
            'email_verified_at' => now(),
            'password' => \Hash::make('ontabebe'),
            'status' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
