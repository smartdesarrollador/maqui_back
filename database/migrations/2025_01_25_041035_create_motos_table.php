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
        Schema::create('motos', function (Blueprint $table) {
            $table->id('id_moto');
            $table->unsignedBigInteger("modelo_id")->nullable();
            $table->foreign("modelo_id")->references("id_modelo")->on("modelos")->onDelete("set null");
            $table->unsignedBigInteger("tipo_moto_id")->nullable();
            $table->foreign("tipo_moto_id")->references("id_tipo_moto")->on("tipo_motos")->onDelete("set null");
            $table->year('año')->nullable();
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->string('color')->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            // Nuevos atributos
            $table->decimal('cilindrada', 10, 1)->nullable();
            $table->string('motor')->nullable();
            $table->string('potencia')->nullable();
            $table->string('arranque')->nullable();
            $table->string('transmision')->nullable();
            $table->decimal('capacidad_tanque', 10, 1)->nullable();

            $table->integer('peso_neto')->nullable();
            $table->integer('carga_util')->nullable();
            $table->integer('peso_bruto')->nullable();
            $table->integer('largo')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('alto')->nullable();

            $table->string('neumatico_delantero')->nullable();
            $table->string('neumatico_posterior')->nullable();
            $table->string('freno_delantero')->nullable();
            $table->string('freno_posterior')->nullable();

            $table->boolean('cargador_usb')->default(false);
            $table->boolean('luz_led')->default(false);
            $table->boolean('alarma')->default(false);
            $table->boolean('cajuela')->default(false);
            $table->boolean('tablero_led')->default(false);
            $table->boolean('mp3')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motos');
    }
};
