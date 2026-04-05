<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('venta_mh_actividad_economica', function (Blueprint $table) {
            $table->id('id_actividad_economica');
            $table->string('actividad_economica');
            $table->string('cod_actividad_economica');
            $table->string('estado')->default('1');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('venta_mh_actividad_economica');
    }
};
