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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id("id_pedido");
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("clientes")->onDelete("set null");
            $table->string("telefono", 250)->nullable();
            $table->date('fecha_pedido')->nullable();
            $table->float("precio_total")->nullable();
            $table->time('horario_pedido', precision: 0);
            /* $table->unsignedBigInteger("estado_pedido_id")->nullable();
            $table->foreign("id_estado_pedido")->references("estado_pedido_id")->on("estado_pedido")->onDelete("set null");
            $table->string("card_number", 250)->nullable();
            $table->string("pedido_observaciones", 250)->nullable();
             $table->date('date_time')->nullable();
             $table->unsignedBigInteger("locales_id")->nullable();
            $table->foreign("id_locales")->references("local_id")->on("locales")->onDelete("set null");
            $table->float("precio_con_descuento")->nullable();
            $table->string("codigo_cupon", 250)->nullable();
            $table->string("estado_descuento", 250)->nullable(); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
