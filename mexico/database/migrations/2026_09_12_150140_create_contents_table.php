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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('contents')->onDelete('set null');
            $table->unsignedBigInteger('featured_media_id')->nullable();
            
            $table->enum('content_type', ['page', 'solution', 'article', 'resource', 'case_study', 'video', 'faq', 'landing']);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('body')->nullable();
            
            $table->enum('status', ['draft', 'review', 'approved', 'scheduled', 'published', 'archived'])->default('draft');
            $table->string('template')->nullable();
            
            $table->string('locale')->default('es-MX');
            
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            
            $table->timestamp('published_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indices
            $table->index('slug');
            $table->index('content_type');
            $table->index('status');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
