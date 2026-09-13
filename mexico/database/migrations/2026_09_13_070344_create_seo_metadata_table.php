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
        Schema::create('seo_metadata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical_url')->nullable();
            
            $table->enum('robots_directive', [
                'index,follow',
                'index,nofollow',
                'noindex,follow',
                'noindex,nofollow'
            ])->default('index,follow');
            
            $table->string('focus_keyword')->nullable()->index();
            $table->string('secondary_keywords')->nullable(); // Can be stored as comma separated
            
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->unsignedBigInteger('og_image_id')->nullable(); // TODO: Add relation to media table when created
            
            $table->enum('twitter_card', [
                'summary',
                'summary_large_image'
            ])->default('summary');
            
            $table->string('hreflang_group')->nullable();
            $table->json('structured_data')->nullable();
            
            $table->boolean('include_in_sitemap')->default(true);
            $table->decimal('sitemap_priority', 3, 2)->default(0.50);
            $table->string('sitemap_changefreq')->default('monthly'); // always, hourly, daily, weekly, monthly, yearly, never

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metadata');
    }
};
