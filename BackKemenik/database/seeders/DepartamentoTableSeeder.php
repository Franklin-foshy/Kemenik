<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([
            ['id' => '1', 'name' => 'Alta Verapaz', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'name' => 'Baja Verapaz', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'name' => 'Chimaltenango', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'name' => 'Chiquimula', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'name' => 'El Progreso', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'name' => 'Escuintla', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'name' => 'Guatemala', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'name' => 'Huehuetenango', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '9', 'name' => 'Izabal', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '10', 'name' => 'Jalapa', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '11', 'name' => 'Jutiapa', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '12', 'name' => 'Petén', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '13', 'name' => 'Quetzaltenango', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '14', 'name' => 'Quiché', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '15', 'name' => 'Retalhuleu', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '16', 'name' => 'Sacatepéquez', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '17', 'name' => 'San Marcos', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '18', 'name' => 'Santa Rosa', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '19', 'name' => 'Sololá', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '20', 'name' => 'Suchitepéquez', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '21', 'name' => 'Totonicapán', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '22', 'name' => 'Zacapa', 'pais_id' => 185, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
