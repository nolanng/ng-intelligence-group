<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::unprepared("
            CREATE TABLE users (
              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(150) NOT NULL,
              email VARCHAR(190) NOT NULL,
              password VARCHAR(255) NOT NULL,
              status ENUM('active','inactive','suspended') NOT NULL DEFAULT 'active',
              locale VARCHAR(10) NOT NULL DEFAULT 'es-MX',
              timezone VARCHAR(60) NOT NULL DEFAULT 'America/Mexico_City',
              email_verified_at TIMESTAMP NULL,
              last_login_at TIMESTAMP NULL,
              last_login_ip VARCHAR(45) NULL,
              remember_token VARCHAR(100) NULL,
              created_at TIMESTAMP NULL,
              updated_at TIMESTAMP NULL,
              deleted_at TIMESTAMP NULL,
              UNIQUE KEY uq_users_email (email),
              KEY idx_users_status (status)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }
    public function down(): void {
        DB::unprepared("DROP TABLE IF EXISTS users;");
    }
};
