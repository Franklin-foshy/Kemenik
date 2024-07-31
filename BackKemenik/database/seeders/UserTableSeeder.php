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
            'sexo' => 'Masculino',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('ontabebe'),
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
            'sexo' => 'Femenino',
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
