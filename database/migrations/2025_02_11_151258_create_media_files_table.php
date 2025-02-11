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
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 255)->nullable();
            $table->string('file_path', 255)->nullable(); 
            $table->string('file_type', 50)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->string('extension', 20)->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->float('duration')->nullable();
            $table->text('description')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('title')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->integer('sort_order')->nullable()->default(0);
            $table->foreignId('category_id')->nullable()->constrained('media_categories')->nullOnDelete();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};
