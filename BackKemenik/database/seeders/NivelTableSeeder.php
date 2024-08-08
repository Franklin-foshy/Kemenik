<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nivel::create([

            'name' => 'Nivel 1',
            'descripcion' => 'Este es el nivel uno',
            'imagen' => 'uno.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Nivel::create([

            'name' => 'Nivel 2',
            'descripcion' => 'Este es el nivel dos',
            'imagen' => 'dos.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Nivel::create([

            'name' => 'Nivel 3',
            'descripcion' => 'Este es el nivel tres',
            'imagen' => 'tres.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
