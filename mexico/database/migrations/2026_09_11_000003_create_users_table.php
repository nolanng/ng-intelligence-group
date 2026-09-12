<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 190)->unique('uq_users_email');
            $table->string('password', 255);
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->index('idx_users_status');
            $table->string('locale', 10)->default('es-MX');
            $table->string('timezone', 60)->default('America/Mexico_City');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
