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
        Schema::create('tabla1', function (Blueprint $table) {
            $table->id();
            $table->string('varchar1', 250)->nullable();
            $table->string('varchar2', 250)->nullable();
            $table->string('varchar3', 250)->nullable();
            $table->string('varchar4', 250)->nullable();
            $table->string('varchar5', 250)->nullable();
            $table->string('varchar6', 250)->nullable();
            $table->string('varchar7', 250)->nullable();
            $table->decimal('decimal1', 10, 2)->nullable();
            $table->decimal('decimal2', 10, 2)->nullable();
            $table->decimal('decimal3', 10, 2)->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->text('text3')->nullable();
            $table->boolean('boolean1')->nullable();
            $table->date('date1')->nullable();
            $table->time('time1')->nullable();
            $table->unsignedBigInteger('categoria1_id')->nullable();
            $table->foreign('categoria1_id')->references('id')->on('categoria1')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla1');
    }
};
