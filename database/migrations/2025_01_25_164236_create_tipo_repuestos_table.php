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
        Schema::create('tipo_repuestos', function (Blueprint $table) {
            $table->id('id_tipo_repuesto');
            $table->string('nombre')->nullable(); // Nombre del tipo de repuesto
            $table->text('descripcion')->nullable(); // Descripción del tipo de repuesto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_repuestos');
    }
};
