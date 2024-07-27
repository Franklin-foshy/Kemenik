<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pregunta;

class PreguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pregunta::create([
            'nivel_id' => 1,
            'texto_pregunta' => 'Cuantas vocales existes',
            'texto_respuesta' => 5,
            'imagen' => 'uno.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Pregunta::create([
            'nivel_id' => 1,
            'texto_pregunta' => 'Cuantos días tiene la semana',
            'texto_respuesta' => 7,
            'imagen' => 'dos.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Pregunta::create([
            'nivel_id' => 1,
            'texto_pregunta' => 'Cual es la primera letra del abc',
            'texto_respuesta' => 'a',
            'imagen' => 'tres.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
