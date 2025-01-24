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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id("id_detalle_pedido");
            $table->unsignedBigInteger("pedido_id")->nullable();
            $table->foreign("pedido_id")->references("id_pedido")->on("pedidos")->onDelete("set null");
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id_producto")->on("productos")->onDelete("set null");
            $table->integer("cantidad")->nullable();
            $table->string("item_descripcion", 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
