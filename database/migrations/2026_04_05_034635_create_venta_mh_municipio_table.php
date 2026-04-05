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
        Schema::create('venta_mh_municipio', function (Blueprint $table) {
            $table->id('id_municipio');
            $table->string('municipio');
            $table->string('cod_mh_municipio');
            $table->integer('cod_mh_departamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_mh_municipio');
    }
};
