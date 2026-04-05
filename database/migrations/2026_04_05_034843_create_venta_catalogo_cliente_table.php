<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venta_catalogo_cliente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_tipo_documento')->nullable()
                ->constrained('venta_mh_tipo_documento', 'id_tipo_documento')->nullOnDelete();
            $table->string('dui_nit')->nullable();
            $table->string('nrc')->nullable();
            $table->string('nombre')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('region')->nullable();
            $table->foreignId('cod_actividad_economica')->nullable()
                ->constrained('venta_mh_actividad_economica', 'id_actividad_economica')->nullOnDelete();
            $table->foreignId('cod_departamento')->nullable()
                ->constrained('venta_mh_departamento', 'id_departamento')->nullOnDelete();
            $table->foreignId('cod_municipio')->nullable()
                ->constrained('venta_mh_municipio', 'id_municipio')->nullOnDelete();
            $table->foreignId('fk_id_tipo_contribuyente')->nullable()
                ->constrained('venta_mh_tipo_contribuyente', 'id_tipo_contribuyente')->nullOnDelete();
            $table->integer('tipo_persona')->nullable();
            $table->foreignId('fk_id_pais')->nullable()
                ->constrained('venta_mh_pais', 'id_pais')->nullOnDelete();
            $table->text('descripcion_adicional')->nullable();
            $table->integer('tipo_cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_catalogo_cliente');
    }
};
