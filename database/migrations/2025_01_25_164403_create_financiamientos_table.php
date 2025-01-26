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
        Schema::create('financiamientos', function (Blueprint $table) {
            $table->id('id_financiamiento');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("cliente")->onDelete("set null");
            $table->decimal('monto_financiado', 10, 2)->nullable();
            $table->integer('plazo')->nullable(); // En meses
            $table->decimal('interes', 5, 2)->nullable(); // En porcentaje
            $table->decimal('cuota_mensual', 10, 2)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('estado')->default('activo')->nullable(); // Activo, pagado, cancelado
            $table->string('situacion_laboral')->nullable(); // Dependiente o Independiente
            $table->decimal('cuota_inicial', 10, 2)->nullable();
            $table->decimal('ingreso_mensual', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financiamientos');
    }
};
