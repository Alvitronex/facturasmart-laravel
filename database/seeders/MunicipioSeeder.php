<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            ['id_municipio' =>   1, 'municipio' => 'AHUACHAPÁN',              'cod_mh_municipio' => '01', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   2, 'municipio' => 'APANECA',                 'cod_mh_municipio' => '02', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   3, 'municipio' => 'ATIQUIZAYA',              'cod_mh_municipio' => '03', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   4, 'municipio' => 'CONCEPCIÓN DE ATACO',     'cod_mh_municipio' => '04', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   5, 'municipio' => 'EL REFUGIO',              'cod_mh_municipio' => '05', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   6, 'municipio' => 'GUAYMANGO',               'cod_mh_municipio' => '06', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   7, 'municipio' => 'JUJUTLA',                 'cod_mh_municipio' => '07', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   8, 'municipio' => 'SAN FRANCISCO MENÉNDEZ',  'cod_mh_municipio' => '08', 'cod_mh_departamento' => 1],
            ['id_municipio' =>   9, 'municipio' => 'SAN LORENZO',             'cod_mh_municipio' => '09', 'cod_mh_departamento' => 1],
            ['id_municipio' =>  10, 'municipio' => 'SAN PEDRO PUXTLA',        'cod_mh_municipio' => '10', 'cod_mh_departamento' => 1],
            ['id_municipio' =>  11, 'municipio' => 'TACUBA',                  'cod_mh_municipio' => '11', 'cod_mh_departamento' => 1],
            ['id_municipio' =>  12, 'municipio' => 'TURÍN',                   'cod_mh_municipio' => '12', 'cod_mh_departamento' => 1],
            ['id_municipio' =>  13, 'municipio' => 'CANDELARIA DE LA FRONTERA', 'cod_mh_municipio' => '01', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  14, 'municipio' => 'COATEPEQUE',              'cod_mh_municipio' => '02', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  15, 'municipio' => 'CHALCHUAPA',              'cod_mh_municipio' => '03', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  16, 'municipio' => 'EL CONGO',                'cod_mh_municipio' => '04', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  17, 'municipio' => 'EL PORVENIR',             'cod_mh_municipio' => '05', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  18, 'municipio' => 'MASAHUAT',                'cod_mh_municipio' => '06', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  19, 'municipio' => 'METAPÁN',                 'cod_mh_municipio' => '07', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  20, 'municipio' => 'SAN ANTONIO PAJONAL',     'cod_mh_municipio' => '08', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  21, 'municipio' => 'SAN SEBASTIÁN SALITRILLO', 'cod_mh_municipio' => '09', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  22, 'municipio' => 'SANTA ANA',               'cod_mh_municipio' => '10', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  23, 'municipio' => 'STA ROSA GUACHI',         'cod_mh_municipio' => '11', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  24, 'municipio' => 'STGO D LA FRONT',         'cod_mh_municipio' => '12', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  25, 'municipio' => 'TEXISTEPEQUE',            'cod_mh_municipio' => '13', 'cod_mh_departamento' => 2],
            ['id_municipio' =>  26, 'municipio' => 'ACAJUTLA',                'cod_mh_municipio' => '01', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  27, 'municipio' => 'ARMENIA',                 'cod_mh_municipio' => '02', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  28, 'municipio' => 'CALUCO',                  'cod_mh_municipio' => '03', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  29, 'municipio' => 'CUISNAHUAT',              'cod_mh_municipio' => '04', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  30, 'municipio' => 'STA I ISHUATAN',          'cod_mh_municipio' => '05', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  31, 'municipio' => 'IZALCO',                  'cod_mh_municipio' => '06', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  32, 'municipio' => 'JUAYÚA',                  'cod_mh_municipio' => '07', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  33, 'municipio' => 'NAHUIZALCO',              'cod_mh_municipio' => '08', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  34, 'municipio' => 'NAHULINGO',               'cod_mh_municipio' => '09', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  35, 'municipio' => 'SALCOATITÁN',             'cod_mh_municipio' => '10', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  36, 'municipio' => 'SAN ANTONIO DEL MONTE',   'cod_mh_municipio' => '11', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  37, 'municipio' => 'SAN JULIÁN',              'cod_mh_municipio' => '12', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  38, 'municipio' => 'STA C MASAHUAT',          'cod_mh_municipio' => '13', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  39, 'municipio' => 'SANTO DOMINGO GUZMÁN',    'cod_mh_municipio' => '14', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  40, 'municipio' => 'SONSONATE',               'cod_mh_municipio' => '15', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  41, 'municipio' => 'SONZACATE',               'cod_mh_municipio' => '16', 'cod_mh_departamento' => 3],
            ['id_municipio' =>  97, 'municipio' => 'AGUILARES',               'cod_mh_municipio' => '01', 'cod_mh_departamento' => 6],
            ['id_municipio' =>  98, 'municipio' => 'APOPA',                   'cod_mh_municipio' => '02', 'cod_mh_departamento' => 6],
            ['id_municipio' =>  99, 'municipio' => 'AYUTUXTEPEQUE',           'cod_mh_municipio' => '03', 'cod_mh_departamento' => 6],
            ['id_municipio' => 100, 'municipio' => 'CUSCATANCINGO',           'cod_mh_municipio' => '04', 'cod_mh_departamento' => 6],
            ['id_municipio' => 101, 'municipio' => 'EL PAISNAL',              'cod_mh_municipio' => '05', 'cod_mh_departamento' => 6],
            ['id_municipio' => 102, 'municipio' => 'GUAZAPA',                 'cod_mh_municipio' => '06', 'cod_mh_departamento' => 6],
            ['id_municipio' => 103, 'municipio' => 'ILOPANGO',                'cod_mh_municipio' => '07', 'cod_mh_departamento' => 6],
            ['id_municipio' => 104, 'municipio' => 'MEJICANOS',               'cod_mh_municipio' => '08', 'cod_mh_departamento' => 6],
            ['id_municipio' => 105, 'municipio' => 'NEJAPA',                  'cod_mh_municipio' => '09', 'cod_mh_departamento' => 6],
            ['id_municipio' => 106, 'municipio' => 'PANCHIMALCO',             'cod_mh_municipio' => '10', 'cod_mh_departamento' => 6],
            ['id_municipio' => 107, 'municipio' => 'ROSARIO DE MORA',         'cod_mh_municipio' => '11', 'cod_mh_departamento' => 6],
            ['id_municipio' => 108, 'municipio' => 'SAN MARCOS',              'cod_mh_municipio' => '12', 'cod_mh_departamento' => 6],
            ['id_municipio' => 109, 'municipio' => 'SAN MARTIN',              'cod_mh_municipio' => '13', 'cod_mh_departamento' => 6],
            ['id_municipio' => 110, 'municipio' => 'SAN SALVADOR',            'cod_mh_municipio' => '14', 'cod_mh_departamento' => 6],
            ['id_municipio' => 111, 'municipio' => 'STG TEXACUANGOS',         'cod_mh_municipio' => '15', 'cod_mh_departamento' => 6],
            ['id_municipio' => 112, 'municipio' => 'SANTO TOMAS',             'cod_mh_municipio' => '16', 'cod_mh_departamento' => 6],
            ['id_municipio' => 113, 'municipio' => 'SOYAPANGO',               'cod_mh_municipio' => '17', 'cod_mh_departamento' => 6],
            ['id_municipio' => 114, 'municipio' => 'TONACATEPEQUE',           'cod_mh_municipio' => '18', 'cod_mh_departamento' => 6],
            ['id_municipio' => 115, 'municipio' => 'CIUDAD DELGADO',          'cod_mh_municipio' => '19', 'cod_mh_departamento' => 6],
            ['id_municipio' =>  75, 'municipio' => 'ANTIGUO CUSCATLÁN',       'cod_mh_municipio' => '01', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  76, 'municipio' => 'CIUDAD ARCE',             'cod_mh_municipio' => '02', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  77, 'municipio' => 'COLON',                   'cod_mh_municipio' => '03', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  78, 'municipio' => 'COMASAGUA',               'cod_mh_municipio' => '04', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  79, 'municipio' => 'CHILTIUPAN',              'cod_mh_municipio' => '05', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  80, 'municipio' => 'HUIZÚCAR',                'cod_mh_municipio' => '06', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  81, 'municipio' => 'JAYAQUE',                 'cod_mh_municipio' => '07', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  82, 'municipio' => 'JICALAPA',                'cod_mh_municipio' => '08', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  83, 'municipio' => 'LA LIBERTAD',             'cod_mh_municipio' => '09', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  84, 'municipio' => 'NUEVO CUSCATLÁN',         'cod_mh_municipio' => '10', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  85, 'municipio' => 'SANTA TECLA',             'cod_mh_municipio' => '11', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  86, 'municipio' => 'QUEZALTEPEQUE',           'cod_mh_municipio' => '12', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  87, 'municipio' => 'SACACOYO',                'cod_mh_municipio' => '13', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  88, 'municipio' => 'SAN JOSÉ VILLANUEVA',     'cod_mh_municipio' => '14', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  89, 'municipio' => 'SAN JUAN OPICO',          'cod_mh_municipio' => '15', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  90, 'municipio' => 'SAN MATÍAS',              'cod_mh_municipio' => '16', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  91, 'municipio' => 'SAN PABLO TACACHICO',     'cod_mh_municipio' => '17', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  92, 'municipio' => 'TAMANIQUE',               'cod_mh_municipio' => '18', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  93, 'municipio' => 'TALNIQUE',                'cod_mh_municipio' => '19', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  94, 'municipio' => 'TEOTEPEQUE',              'cod_mh_municipio' => '20', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  95, 'municipio' => 'TEPECOYO',                'cod_mh_municipio' => '21', 'cod_mh_departamento' => 5],
            ['id_municipio' =>  96, 'municipio' => 'ZARAGOZA',                'cod_mh_municipio' => '22', 'cod_mh_departamento' => 5],
            ['id_municipio' => 283, 'municipio' => 'San Salvador Norte',      'cod_mh_municipio' => '20', 'cod_mh_departamento' => 20],
            ['id_municipio' => 284, 'municipio' => 'San Salvador Oeste',      'cod_mh_municipio' => '21', 'cod_mh_departamento' => 20],
            ['id_municipio' => 285, 'municipio' => 'San Salvador Este',       'cod_mh_municipio' => '22', 'cod_mh_departamento' => 20],
            ['id_municipio' => 286, 'municipio' => 'San Salvador Centro',     'cod_mh_municipio' => '23', 'cod_mh_departamento' => 20],
            ['id_municipio' => 287, 'municipio' => 'San Salvador Sur',        'cod_mh_municipio' => '24', 'cod_mh_departamento' => 20],
            ['id_municipio' => 277, 'municipio' => 'La Libertad Norte',       'cod_mh_municipio' => '23', 'cod_mh_departamento' => 19],
            ['id_municipio' => 278, 'municipio' => 'La Libertad Centro',      'cod_mh_municipio' => '24', 'cod_mh_departamento' => 19],
            ['id_municipio' => 279, 'municipio' => 'La Libertad Oeste',       'cod_mh_municipio' => '25', 'cod_mh_departamento' => 19],
            ['id_municipio' => 280, 'municipio' => 'La Libertad Este',        'cod_mh_municipio' => '26', 'cod_mh_departamento' => 19],
            ['id_municipio' => 281, 'municipio' => 'La Libertad Costa',       'cod_mh_municipio' => '27', 'cod_mh_departamento' => 19],
            ['id_municipio' => 282, 'municipio' => 'La Libertad Sur',         'cod_mh_municipio' => '28', 'cod_mh_departamento' => 19],
            ['id_municipio' => 307, 'municipio' => 'Otro (Para extranjeros)', 'cod_mh_municipio' => '00', 'cod_mh_departamento' => 29],
        ];

        foreach (array_chunk($municipios, 50) as $chunk) {
            DB::table('venta_mh_municipio')->insert($chunk);
        }
    }
}
