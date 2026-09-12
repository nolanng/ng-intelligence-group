<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::unprepared("
            CREATE TABLE roles (
              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              slug VARCHAR(100) NOT NULL,
              description VARCHAR(255) NULL,
              created_at TIMESTAMP NULL,
              updated_at TIMESTAMP NULL,
              UNIQUE KEY uq_roles_slug (slug)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            INSERT INTO roles (name, slug, created_at, updated_at) VALUES
            ('SuperAdmin','superadmin', NOW(), NOW()),
            ('Administrador','administrador', NOW(), NOW()),
            ('Editor','editor', NOW(), NOW()),
            ('Marketing','marketing', NOW(), NOW()),
            ('Comercial','comercial', NOW(), NOW()),
            ('Auditor','auditor', NOW(), NOW());
        ");
    }
    public function down(): void {
        DB::unprepared("DROP TABLE IF EXISTS roles;");
    }
};
