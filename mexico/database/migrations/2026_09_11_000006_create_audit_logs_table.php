<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('event', ['LOGIN','LOGOUT','CREATE','UPDATE','DELETE','PUBLISH','UNPUBLISH','ROLE_CHANGE','SETTINGS_CHANGE','API_KEY_CHANGE','EXPORT'])->index('idx_audit_event');
            $table->string('auditable_type', 150)->nullable();
            $table->unsignedBigInteger('auditable_id')->nullable();
            $table->string('route', 255)->nullable();
            $table->string('method', 10)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->timestamp('created_at')->nullable()->index('idx_audit_created');
        });
    }
    public function down(): void {
        Schema::dropIfExists('audit_logs');
    }
};
