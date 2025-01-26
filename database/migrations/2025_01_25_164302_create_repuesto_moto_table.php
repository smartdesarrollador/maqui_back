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
        Schema::create('repuesto_moto', function (Blueprint $table) {
            $table->id('id_repuesto_moto');
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
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
        Schema::dropIfExists('repuesto_moto');
    }
};
