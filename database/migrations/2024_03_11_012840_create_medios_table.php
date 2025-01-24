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
        Schema::create('medios', function (Blueprint $table) {
            $table->id("id_medios");
            $table->string('nombre')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('id_tipos_medios')->nullable();
            $table->foreign('id_tipos_medios')->references('id_tipos_medios')->on('tipos_medios')->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medios');
    }
};
