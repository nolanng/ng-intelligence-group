<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->foreignId('content_id')->nullable()->constrained('contents')->onDelete('set null');
            
            $table->string('vertical_code')->nullable()->index();
            
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            
            $table->string('state')->nullable();
            $table->string('industry')->nullable();
            $table->string('employees')->nullable();
            $table->string('need')->nullable();
            $table->text('message')->nullable();
            $table->json('payload')->nullable();
            
            $table->string('source')->nullable();
            $table->string('medium')->nullable();
            $table->string('campaign')->nullable();
            $table->string('term')->nullable();
            $table->string('content')->nullable();
            $table->string('landing_url')->nullable();
            
            $table->timestamp('consent_at')->nullable();
            
            $table->enum('status', [
                'new',
                'assigned',
                'contacted',
                'qualified',
                'proposal',
                'won',
                'lost',
                'discarded'
            ])->default('new')->index();
            
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null')->index();
            
            $table->string('ip_hash')->nullable();
            
            $table->timestamps();
            
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
