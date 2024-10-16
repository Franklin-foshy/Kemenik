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
            PaisTableSeeder::class,
            DepartamentoTableSeeder::class,
            MunicipioTableSeeder::class,
            RolTableSeeder::class,
            UserTableSeeder::class,
            NivelTableSeeder::class,
            PreguntaTableSeeder::class,
            RespuestaTableSeeder::class,
            RompecabezaTableSeeder::class,
            EscenaTableSeeder::class,
            PPreguntaTableSeeder::class,
            PRespuestaTableSeeder::class,
        ]);
    }
}
