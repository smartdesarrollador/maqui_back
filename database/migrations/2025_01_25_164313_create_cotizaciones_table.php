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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("cliente")->onDelete("set null");
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
            $table->decimal('precio_total', 10, 2)->nullable();
            $table->string('estado')->default('pendiente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
