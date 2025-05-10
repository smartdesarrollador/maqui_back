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
        Schema::create('moto_colores', function (Blueprint $table) {
            $table->id('id_moto_color');
            $table->unsignedBigInteger('modelo_id');
            $table->string('color');
            $table->string('imagen_color'); // URL o path de la imagen del color específico
            $table->foreign('modelo_id')->references('id_modelo')->on('modelos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moto_colores');
    }
};
