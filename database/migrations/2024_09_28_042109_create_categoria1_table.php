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
        Schema::create('categoria1', function (Blueprint $table) {
            $table->id();
             $table->string('varchar1', 250)->nullable();
            $table->string('varchar2', 250)->nullable();
            $table->string('varchar3', 250)->nullable();
            $table->text('text1')->nullable();
            $table->boolean('boolean1')->nullable();
            $table->date('date1')->nullable();
            $table->time('time1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria1');
    }
};
