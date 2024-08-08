<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rompecabeza;

class RompecabezaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rompecabeza::create([
            'name' => 'Rompecabeza 1',
            'imagen' => 'uno.gif',
            'nivel_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
