<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{

    protected $table = 'venta_mh_municipio';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;

    protected $fillable = [
        'municipio',
        'cod_mh_municipio',
        'cod_mh_departamento',
        'estado',
    ];
}
