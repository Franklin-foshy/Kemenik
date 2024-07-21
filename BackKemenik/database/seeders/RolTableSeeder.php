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
            'permissions' => '{"get_users":"on","post_users":"on","edit_users":"on","delete_users":"on","permissions_users":"on","recover_passwords_users":"on","get_roles":"on","post_roles":"on","edit_roles":"on"}',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        Rol::create([

            'user_id' => 2,
            'name' => 'UsuarioFinal',
            'permissions' => '{"view-usuario-final":"on"}',
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
