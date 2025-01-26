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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id('id_modelo');
            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id_marca")->on("marcas")->onDelete("set null");
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Deportiva, Touring, etc.
            $table->integer('cilindrada')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};
