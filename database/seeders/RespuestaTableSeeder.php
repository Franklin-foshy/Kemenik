<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Respuesta;

class RespuestaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Respuesta::create([
            'pregunta_id' => 1,
            'texto_respuesta' => 5,
            'imagen' => 'uno.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Respuesta::create([
            'pregunta_id' => 1,
            'texto_respuesta' => 10,
            'imagen' => 'dos.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Respuesta::create([
            'pregunta_id' => 1,
            'texto_respuesta' => 15,
            'imagen' => 'tres.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
