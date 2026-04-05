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
        Schema::create('venta_mh_tipo_contribuyente', function (Blueprint $table) {
            $table->id('id_tipo_contribuyente');
            $table->string('tipo_contribuyente');
            $table->string('estado')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_mh_tipo_contribuyente');
    }
};
