<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venta_catalogo_cliente')->insert([
            'cod_tipo_documento'       => 1,
            'dui_nit'                  => '06141106131060',
            'nrc'                      => '2259890',
            'nombre'                   => 'Distribuidora Internacional Medwell',
            'nombre_comercial'         => 'Distribuidora Internacional Medwell',
            'telefono'                 => '74905319',
            'correo'                   => 'facturasdepruebafees@gmail.com',
            'direccion'                => '12 av',
            'ciudad'                   => 'San Salvador',
            'cod_actividad_economica'  => 492,
            'cod_departamento'         => 20,
            'cod_municipio'            => 283,
            'fk_id_tipo_contribuyente' => 1,
            'tipo_persona'             => 1,
            'fk_id_pais'               => 87,
            'tipo_cliente'             => 2,
            'created_at'               => now(),
            'updated_at'               => now(),
        ]);
    }
}
