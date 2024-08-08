<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PPregunta;

class PPreguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PPregunta::create([
            'nivel_id' => 2,
            'escena_id' => 1,
            'nombre' => 'Nombre de personaje uno',
            'texto_pregunta' => 'Hola, cuantos veces tienes que planchar?',
            'texto_respuesta' => 5,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        PPregunta::create([
            'nivel_id' => 2,
            'escena_id' => 1,
            'nombre' => 'Nombre de personaje dos',
            'texto_pregunta' => 'Ya lo hiciste?',
            'texto_respuesta' => 'Si',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
