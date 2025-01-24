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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id("id_cliente");
            $table->string("nombre", 250)->nullable();
            $table->string("apellido", 250)->nullable();
            $table->string("email", 250)->nullable();
            /* $table->string("password", 250)->nullable(); */
            $table->string("dni", 250)->nullable();
            $table->string("celular", 250)->nullable();
            $table->string("direccion", 250)->nullable();
           /*  $table->string("reputacion", 250)->nullable();
            $table->integer("puntos")->nullable();
            $table->string("estado", 250)->nullable();
            $table->date("fechaRegistro")->nullable();
            $table->string("passRecoveryToken", 250)->nullable();
            $table->string("oauth_provider", 250)->nullable();
            $table->string("oauth_uid", 250)->nullable();
            $table->string("qrCode", 250)->nullable();
            $table->decimal('saldoBilletera', 5,2)->nullable();
            $table->string("cuentaConfigurada", 250)->nullable();
            $table->string("configAccounToken", 250)->nullable();
            $table->string("distrito", 250)->nullable();
            $table->string("latitud", 250)->nullable();
            $table->string("longitud", 250)->nullable();
            $table->integer("store_id")->nullable(); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
