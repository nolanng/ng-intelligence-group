<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('slug')->unique();
            
            $table->enum('form_type', [
                'contact',
                'demo',
                'consultation',
                'diagnosis',
                'quote',
                'download',
                'newsletter'
            ]);
            
            $table->json('configuration')->nullable();
            $table->string('success_message')->nullable();
            $table->string('notification_email')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
