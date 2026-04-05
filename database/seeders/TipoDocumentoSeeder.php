<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venta_mh_tipo_documento')->insert([
            ['id_tipo_documento' => 1, 'tipo_documento' => 'NIT (Ingresar sin guión)',   'cod_tipo_documento' => '36', 'estado' => '1'],
            ['id_tipo_documento' => 2, 'tipo_documento' => 'DUI (12345678-9)',           'cod_tipo_documento' => '13', 'estado' => '1'],
            ['id_tipo_documento' => 3, 'tipo_documento' => 'DUI HOMOLOGADO (123456789)', 'cod_tipo_documento' => '36', 'estado' => '1'],
            ['id_tipo_documento' => 4, 'tipo_documento' => 'Otro',                       'cod_tipo_documento' => '37', 'estado' => '1'],
        ]);
    }
}
