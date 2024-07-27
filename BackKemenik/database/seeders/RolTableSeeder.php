<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([

            'user_id' => 1,
            'name' => 'Administador',
            'permissions' => '{"admin":"on","get_users":"on","post_users":"on","edit_users":"on","delete_users":"on","permissions_users":"on","recover_passwords_users":"on","get_roles":"on","post_roles":"on","edit_roles":"on","get_niveles":"on","post_niveles":"on","edit_niveles":"on","delete_niveles":"on","get_preguntas":"on","post_preguntas":"on","edit_preguntas":"on","delete_preguntas":"on","get_respuestas":"on","post_respuestas":"on","edit_respuestas":"on","delete_respuestas":"on"}',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        Rol::create([

            'user_id' => 2,
            'name' => 'UsuarioFinal',
            'permissions' => '{"usuariofinal":"on"}',
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
