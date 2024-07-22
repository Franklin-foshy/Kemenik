<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'email' => 'rdfuentes@gmail.com',
            'role_id' => 1,
            'permissions' => '{"get_users":"on","post_users":"on","edit_users":"on","delete_users":"on","permissions_users":"on","recover_passwords_users":"on","get_roles":"on","post_roles":"on","edit_roles":"on"}',
            'email_verified_at' => now(),
            'password' => \Hash::make('ontabebe'),
            'status' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
