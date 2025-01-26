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
        Schema::create('repuestos', function (Blueprint $table) {
            $table->id('id_repuesto');
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Motor, frenos, suspensión, etc.
            $table->decimal('precio', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            $table->unsignedBigInteger("tipo_repuesto_id")->nullable();
            $table->foreign("tipo_repuesto_id")->references("id_tipo_repuesto")->on("tipo_repuestos")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos');
    }
};
