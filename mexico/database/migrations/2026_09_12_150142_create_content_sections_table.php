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
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            
            $table->enum('section_type', ['hero', 'rich_text', 'benefits', 'features', 'stats', 'process', 'industry', 'video', 'faq', 'cta', 'resource', 'related_content', 'form']);
            $table->string('internal_name')->nullable();
            
            $table->string('heading')->nullable();
            $table->string('subheading')->nullable();
            $table->longText('content')->nullable();
            
            $table->json('configuration')->nullable();
            
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
