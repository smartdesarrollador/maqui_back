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
        Schema::create('accesorios', function (Blueprint $table) {
            $table->id('id_accesorio');
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Casco, guantes, etc.
            $table->decimal('precio', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            $table->unsignedBigInteger("tipo_accesorio_id")->nullable();
            $table->foreign("tipo_accesorio_id")->references("id_tipo_accesorio")->on("tipo_accesorios")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesorios');
    }
};
