<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PRespuesta;

class PRespuestaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PRespuesta::create([
            'ppregunta_id' => 1,
            'nombre' => 'Nombre de personaje uno',
            'texto_respuesta' => 5,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        PRespuesta::create([
            'ppregunta_id' => 2,
            'nombre' => 'Nombre de personaje dos',
            'texto_respuesta' => 'Si',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
