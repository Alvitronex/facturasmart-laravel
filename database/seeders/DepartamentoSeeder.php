<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venta_mh_departamento')->insert([
            ['id_departamento' =>  1, 'departamento' => 'Ahuachapán',   'cod_mh_departamento' => '01', 'estado' => '0'],
            ['id_departamento' =>  2, 'departamento' => 'Santa Ana',    'cod_mh_departamento' => '02', 'estado' => '0'],
            ['id_departamento' =>  3, 'departamento' => 'Sonsonate',    'cod_mh_departamento' => '03', 'estado' => '0'],
            ['id_departamento' =>  4, 'departamento' => 'Chalatenango', 'cod_mh_departamento' => '04', 'estado' => '0'],
            ['id_departamento' =>  5, 'departamento' => 'La Libertad',  'cod_mh_departamento' => '05', 'estado' => '0'],
            ['id_departamento' =>  6, 'departamento' => 'San Salvador', 'cod_mh_departamento' => '06', 'estado' => '0'],
            ['id_departamento' =>  7, 'departamento' => 'Cuscatlán',    'cod_mh_departamento' => '07', 'estado' => '0'],
            ['id_departamento' =>  8, 'departamento' => 'La Paz',       'cod_mh_departamento' => '08', 'estado' => '0'],
            ['id_departamento' =>  9, 'departamento' => 'Cabañas',      'cod_mh_departamento' => '09', 'estado' => '0'],
            ['id_departamento' => 10, 'departamento' => 'San Vicente',  'cod_mh_departamento' => '10', 'estado' => '0'],
            ['id_departamento' => 11, 'departamento' => 'Usulután',     'cod_mh_departamento' => '11', 'estado' => '0'],
            ['id_departamento' => 12, 'departamento' => 'San Miguel',   'cod_mh_departamento' => '12', 'estado' => '0'],
            ['id_departamento' => 13, 'departamento' => 'Morazán',      'cod_mh_departamento' => '13', 'estado' => '0'],
            ['id_departamento' => 14, 'departamento' => 'La Unión',     'cod_mh_departamento' => '14', 'estado' => '0'],
            ['id_departamento' => 15, 'departamento' => 'Ahuachapán',   'cod_mh_departamento' => '01', 'estado' => '1'],
            ['id_departamento' => 16, 'departamento' => 'Santa Ana',    'cod_mh_departamento' => '02', 'estado' => '1'],
            ['id_departamento' => 17, 'departamento' => 'Sonsonate',    'cod_mh_departamento' => '03', 'estado' => '1'],
            ['id_departamento' => 18, 'departamento' => 'Chalatenango', 'cod_mh_departamento' => '04', 'estado' => '1'],
            ['id_departamento' => 19, 'departamento' => 'La Libertad',  'cod_mh_departamento' => '05', 'estado' => '1'],
            ['id_departamento' => 20, 'departamento' => 'San Salvador', 'cod_mh_departamento' => '06', 'estado' => '1'],
            ['id_departamento' => 21, 'departamento' => 'Cuscatlán',    'cod_mh_departamento' => '07', 'estado' => '1'],
            ['id_departamento' => 22, 'departamento' => 'La Paz',       'cod_mh_departamento' => '08', 'estado' => '1'],
            ['id_departamento' => 23, 'departamento' => 'Cabañas',      'cod_mh_departamento' => '09', 'estado' => '1'],
            ['id_departamento' => 24, 'departamento' => 'San Vicente',  'cod_mh_departamento' => '10', 'estado' => '1'],
            ['id_departamento' => 25, 'departamento' => 'Usulután',     'cod_mh_departamento' => '11', 'estado' => '1'],
            ['id_departamento' => 26, 'departamento' => 'San Miguel',   'cod_mh_departamento' => '12', 'estado' => '1'],
            ['id_departamento' => 27, 'departamento' => 'Morazán',      'cod_mh_departamento' => '13', 'estado' => '1'],
            ['id_departamento' => 28, 'departamento' => 'La Unión',     'cod_mh_departamento' => '14', 'estado' => '1'],
        ]);
    }
}
