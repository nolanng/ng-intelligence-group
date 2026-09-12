<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    // Generado desde docs/schema.sql
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

            CREATE TABLE permissions (
              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(150) NOT NULL,
              slug VARCHAR(150) NOT NULL,
              module VARCHAR(100) NULL,
              created_at TIMESTAMP NULL,
              updated_at TIMESTAMP NULL,
              UNIQUE KEY uq_permissions_slug (slug)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

            CREATE TABLE role_user (
              role_id BIGINT UNSIGNED NOT NULL,
              user_id BIGINT UNSIGNED NOT NULL,
              PRIMARY KEY (role_id, user_id),
              CONSTRAINT fk_role_user_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
              CONSTRAINT fk_role_user_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            CREATE TABLE permission_role (
              permission_id BIGINT UNSIGNED NOT NULL,
              role_id BIGINT UNSIGNED NOT NULL,
              PRIMARY KEY (permission_id, role_id),
              CONSTRAINT fk_permission_role_permission FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
              CONSTRAINT fk_permission_role_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

            INSERT INTO roles (name, slug, created_at, updated_at) VALUES
            ('SuperAdmin','superadmin', NOW(), NOW()),
            ('Administrador','administrador', NOW(), NOW()),
            ('Editor','editor', NOW(), NOW()),
            ('Marketing','marketing', NOW(), NOW()),
            ('Comercial','comercial', NOW(), NOW()),
            ('Auditor','auditor', NOW(), NOW());
        ");
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    DB::unprepared("
            DROP TABLE IF EXISTS audit_logs;
            DROP TABLE IF EXISTS permission_role;
            DROP TABLE IF EXISTS role_user;
            DROP TABLE IF EXISTS users;
            DROP TABLE IF EXISTS permissions;
            DROP TABLE IF EXISTS roles;
        ");
  }
};
