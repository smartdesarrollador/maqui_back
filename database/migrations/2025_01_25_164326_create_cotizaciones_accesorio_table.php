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
        Schema::create('cotizaciones_accesorio', function (Blueprint $table) {
            $table->id('id_cotizacion_accesorio');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("accesorio_id")->nullable();
            $table->foreign("accesorio_id")->references("id_accesorio")->on("accesorios")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones_accesorio');
    }
};
