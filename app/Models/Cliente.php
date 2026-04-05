<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'venta_catalogo_cliente';
    protected $primaryKey = 'id_catalogo_cliente';
    public $timestamps = true;

    protected $fillable = [
        'tipo_cliente',
        'cod_tipo_documento',
        'dui_nit',
        'nrc',
        'nombre',
        'nombre_comercial',
        'telefono',
        'correo',
        'direccion',
        'ciudad',
        'region',
        'cod_actividad_economica',
        'cod_departamento',
        'cod_municipio',
        'fk_id_tipo_contribuyente',
        'tipo_persona',
        'fk_id_pais',
        'descripcion_adicional',

    ];

    //Relaciones con tablas
    public function tipoDocumento()
    {
        return $this->hasOne(TipoDocumento::class, 'id_tipo_documento', 'cod_tipo_documento');
    }
    public function actividadEconomica()
    {
        return $this->belongsTo(ActividadEconomica::class, 'cod_actividad_economica', 'id_actividad_economica');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cod_departamento', 'id_departamento');
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'cod_municipio', 'id_municipio');
    }
    public function tipoContribuyente()
    {
        return $this->belongsTo(TipoContribuyente::class, 'fk_id_tipo_contribuyente', 'id_tipo_contribuyente');
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'fk_id_pais', 'id_pais');
    }
}
