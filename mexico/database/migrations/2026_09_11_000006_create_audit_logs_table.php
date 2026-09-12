<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::unprepared("
            CREATE TABLE audit_logs (
              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              user_id BIGINT UNSIGNED NULL,
              event ENUM('LOGIN','LOGOUT','CREATE','UPDATE','DELETE','PUBLISH','UNPUBLISH','ROLE_CHANGE','SETTINGS_CHANGE','API_KEY_CHANGE','EXPORT') NOT NULL,
              auditable_type VARCHAR(150) NULL,
              auditable_id BIGINT UNSIGNED NULL,
              route VARCHAR(255) NULL,
              method VARCHAR(10) NULL,
              ip_address VARCHAR(45) NULL,
              user_agent VARCHAR(500) NULL,
              old_values JSON NULL,
              new_values JSON NULL,
              created_at TIMESTAMP NULL,
              KEY idx_audit_created (created_at),
              KEY idx_audit_user (user_id),
              KEY idx_audit_event (event),
              CONSTRAINT fk_audit_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }
    public function down(): void {
        DB::unprepared("DROP TABLE IF EXISTS audit_logs;");
    }
};
