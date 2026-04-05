<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoContribuyenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venta_mh_tipo_contribuyente')->insert([
            ['id_tipo_contribuyente' => 1, 'tipo_contribuyente' => 'GRANDE CONTRIBUYENTE',  'estado' => '1'],
            ['id_tipo_contribuyente' => 2, 'tipo_contribuyente' => 'MEDIANO CONTRIBUYENTE', 'estado' => '1'],
            ['id_tipo_contribuyente' => 3, 'tipo_contribuyente' => 'OTRO CONTRIBUYENTE',    'estado' => '1'],
        ]);
    }
}
