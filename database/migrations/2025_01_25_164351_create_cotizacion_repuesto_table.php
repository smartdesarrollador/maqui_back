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
        Schema::create('cotizacion_repuesto', function (Blueprint $table) {
            $table->id('id_cotizacion_repuesto');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("repuesto_id")->nullable();
            $table->foreign("repuesto_id")->references("id_repuesto")->on("repuestos")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion_repuesto');
    }
};
