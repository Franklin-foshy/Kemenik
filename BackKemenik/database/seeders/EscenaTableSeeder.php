<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Escena;

class EscenaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Escena::create([
            'nivel_id' => 1,
            'descripcion' => 'Esta es la escena principal',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
