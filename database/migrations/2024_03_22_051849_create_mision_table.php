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
        Schema::create('mision', function (Blueprint $table) {
            $table->id("id_mision");
           $table->string("imagen_mision", 250)->nullable();
           $table->string("url_imagen_mision", 250)->nullable();
           $table->string("titulo_mision", 250)->nullable();
           $table->text('contenido_mision')->nullable();
           $table->text('contenido_vision')->nullable();
           $table->text('contenido_valores')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mision');
    }
};
