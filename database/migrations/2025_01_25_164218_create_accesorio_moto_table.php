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
        Schema::create('accesorio_moto', function (Blueprint $table) {
            $table->id('id_accesorio_moto');
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
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
        Schema::dropIfExists('accesorio_moto');
    }
};
