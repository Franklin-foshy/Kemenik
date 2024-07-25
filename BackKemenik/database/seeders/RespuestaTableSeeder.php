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
            'imagen' => 'Englis City.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
