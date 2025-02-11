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
        Schema::create('media_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable()->unique();
            $table->string('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->boolean('is_active')->nullable()->default(true);
            $table->integer('sort_order')->nullable()->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('media_categories')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_categories');
    }
};
