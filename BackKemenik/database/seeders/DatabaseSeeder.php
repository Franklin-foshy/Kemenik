<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolTableSeeder::class,
            UserTableSeeder::class,
            NivelTableSeeder::class,
            PreguntaTableSeeder::class,
            RespuestaTableSeeder::class,
            PaisTableSeeder::class,
            DepartamentoTableSeeder::class,
            MunicipioTableSeeder::class,
        ]);
    }
}
