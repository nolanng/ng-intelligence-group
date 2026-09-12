<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::unprepared("
            CREATE TABLE permission_role (
              permission_id BIGINT UNSIGNED NOT NULL,
              role_id BIGINT UNSIGNED NOT NULL,
              PRIMARY KEY (permission_id, role_id),
              CONSTRAINT fk_permission_role_permission FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
              CONSTRAINT fk_permission_role_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }
    public function down(): void {
        DB::unprepared("DROP TABLE IF EXISTS permission_role;");
    }
};
