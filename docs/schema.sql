-- =========================================================
-- NG TECHNOLOGY MÉXICO — SCHEMA MYSQL 8
-- Base de datos objetivo: ngint380_ng2026
-- Usuario objetivo:       ngint380_2026ng
-- Motor: InnoDB | Charset: utf8mb4 | Collation: utf8mb4_unicode_ci
-- Generado a partir de DATABASE_SPECIFICATION.md v2.0
-- =========================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- =========================================================
-- 1. IDENTITY DOMAIN
-- =========================================================

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

-- =========================================================
-- 2. MEDIA DOMAIN
-- =========================================================

CREATE TABLE media (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  uploaded_by BIGINT UNSIGNED NULL,
  disk VARCHAR(50) NOT NULL DEFAULT 'public',
  directory VARCHAR(255) NULL,
  original_name VARCHAR(255) NOT NULL,
  file_name VARCHAR(255) NOT NULL,
  mime_type VARCHAR(100) NOT NULL,
  extension VARCHAR(10) NOT NULL,
  size_bytes BIGINT UNSIGNED NOT NULL,
  width INT UNSIGNED NULL,
  height INT UNSIGNED NULL,
  alt_text VARCHAR(255) NULL,
  title VARCHAR(255) NULL,
  caption VARCHAR(255) NULL,
  metadata JSON NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  deleted_at TIMESTAMP NULL,
  CONSTRAINT fk_media_user FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL,
  KEY idx_media_mime (mime_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 3. CONTENT DOMAIN
-- =========================================================

CREATE TABLE contents (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  author_id BIGINT UNSIGNED NULL,
  parent_id BIGINT UNSIGNED NULL,
  featured_media_id BIGINT UNSIGNED NULL,
  content_type ENUM('page','solution','article','resource','case_study','video','faq','landing') NOT NULL,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL,
  excerpt VARCHAR(500) NULL,
  body LONGTEXT NULL,
  status ENUM('draft','review','approved','scheduled','published','archived') NOT NULL DEFAULT 'draft',
  template VARCHAR(100) NULL,
  locale VARCHAR(10) NOT NULL DEFAULT 'es-MX',
  sort_order INT UNSIGNED NOT NULL DEFAULT 0,
  is_featured TINYINT(1) NOT NULL DEFAULT 0,
  published_at TIMESTAMP NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  deleted_at TIMESTAMP NULL,
  UNIQUE KEY uq_contents_slug (slug),
  KEY idx_contents_type (content_type),
  KEY idx_contents_status (status),
  KEY idx_contents_published (published_at),
  CONSTRAINT fk_contents_author FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT fk_contents_parent FOREIGN KEY (parent_id) REFERENCES contents(id) ON DELETE SET NULL,
  CONSTRAINT fk_contents_media FOREIGN KEY (featured_media_id) REFERENCES media(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE content_sections (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content_id BIGINT UNSIGNED NOT NULL,
  section_type ENUM('hero','rich_text','benefits','features','stats','process','industry','video','faq','cta','resource','related_content','form') NOT NULL,
  internal_name VARCHAR(150) NULL,
  heading VARCHAR(255) NULL,
  subheading VARCHAR(255) NULL,
  content LONGTEXT NULL,
  configuration JSON NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  KEY idx_sections_content (content_id),
  CONSTRAINT fk_sections_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 4. TAXONOMY DOMAIN
-- =========================================================

CREATE TABLE taxonomies (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  taxonomy_type ENUM('category','tag','industry','solution_category','audience') NOT NULL,
  parent_id BIGINT UNSIGNED NULL,
  name VARCHAR(150) NOT NULL,
  slug VARCHAR(150) NOT NULL,
  description VARCHAR(255) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_taxonomies_slug (slug),
  CONSTRAINT fk_taxonomies_parent FOREIGN KEY (parent_id) REFERENCES taxonomies(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE content_taxonomy (
  content_id BIGINT UNSIGNED NOT NULL,
  taxonomy_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (content_id, taxonomy_id),
  CONSTRAINT fk_ct_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE,
  CONSTRAINT fk_ct_taxonomy FOREIGN KEY (taxonomy_id) REFERENCES taxonomies(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 5. SEO DOMAIN
-- =========================================================

CREATE TABLE seo_metadata (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content_id BIGINT UNSIGNED NOT NULL,
  meta_title VARCHAR(60) NULL,
  meta_description VARCHAR(160) NULL,
  canonical_url VARCHAR(255) NULL,
  robots_directive ENUM('index,follow','index,nofollow','noindex,follow','noindex,nofollow') NOT NULL DEFAULT 'index,follow',
  focus_keyword VARCHAR(150) NULL,
  secondary_keywords VARCHAR(500) NULL,
  og_title VARCHAR(150) NULL,
  og_description VARCHAR(300) NULL,
  og_image_id BIGINT UNSIGNED NULL,
  twitter_card ENUM('summary','summary_large_image') NOT NULL DEFAULT 'summary_large_image',
  hreflang_group VARCHAR(50) NULL DEFAULT 'es-mx',
  structured_data JSON NULL,
  include_in_sitemap TINYINT(1) NOT NULL DEFAULT 1,
  sitemap_priority DECIMAL(2,1) NOT NULL DEFAULT 0.5,
  sitemap_changefreq VARCHAR(20) NOT NULL DEFAULT 'monthly',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_seo_content (content_id),
  KEY idx_seo_focus_keyword (focus_keyword),
  CONSTRAINT fk_seo_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE,
  CONSTRAINT fk_seo_og_image FOREIGN KEY (og_image_id) REFERENCES media(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 6. BANNERS
-- =========================================================

CREATE TABLE banners (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  placement ENUM('homepage','solution','blog','resources','footer') NOT NULL,
  title VARCHAR(255) NULL,
  subtitle VARCHAR(255) NULL,
  image_id BIGINT UNSIGNED NULL,
  mobile_image_id BIGINT UNSIGNED NULL,
  cta_label VARCHAR(100) NULL,
  cta_url VARCHAR(255) NULL,
  starts_at TIMESTAMP NULL,
  ends_at TIMESTAMP NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  CONSTRAINT fk_banners_image FOREIGN KEY (image_id) REFERENCES media(id) ON DELETE SET NULL,
  CONSTRAINT fk_banners_mobile_image FOREIGN KEY (mobile_image_id) REFERENCES media(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 7. FAQ DOMAIN
-- =========================================================

CREATE TABLE faqs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content_id BIGINT UNSIGNED NOT NULL,
  question VARCHAR(255) NOT NULL,
  answer TEXT NOT NULL,
  locale VARCHAR(10) NOT NULL DEFAULT 'es-MX',
  sort_order INT UNSIGNED NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  KEY idx_faqs_content (content_id),
  CONSTRAINT fk_faqs_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 8. FORMS & LEADS DOMAIN
-- =========================================================

CREATE TABLE forms (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  slug VARCHAR(150) NOT NULL,
  form_type ENUM('contact','demo','consultation','diagnosis','quote','download','newsletter') NOT NULL,
  configuration JSON NULL,
  success_message VARCHAR(255) NULL,
  notification_email VARCHAR(190) NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_forms_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE form_submissions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  form_id BIGINT UNSIGNED NOT NULL,
  content_id BIGINT UNSIGNED NULL,
  vertical_code VARCHAR(100) NULL,
  name VARCHAR(150) NOT NULL,
  company VARCHAR(150) NULL,
  email VARCHAR(190) NOT NULL,
  phone VARCHAR(30) NULL,
  state VARCHAR(100) NULL,
  industry VARCHAR(100) NULL,
  employees VARCHAR(50) NULL,
  need VARCHAR(255) NULL,
  message TEXT NULL,
  payload JSON NULL,
  source VARCHAR(100) NULL,
  medium VARCHAR(100) NULL,
  campaign VARCHAR(150) NULL,
  term VARCHAR(150) NULL,
  content VARCHAR(150) NULL,
  landing_url VARCHAR(255) NULL,
  consent_at TIMESTAMP NULL,
  status ENUM('new','assigned','contacted','qualified','proposal','won','lost','discarded') NOT NULL DEFAULT 'new',
  assigned_to BIGINT UNSIGNED NULL,
  ip_hash VARCHAR(64) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  KEY idx_leads_status (status),
  KEY idx_leads_created (created_at),
  KEY idx_leads_vertical (vertical_code),
  KEY idx_leads_assigned (assigned_to),
  CONSTRAINT fk_leads_form FOREIGN KEY (form_id) REFERENCES forms(id) ON DELETE RESTRICT,
  CONSTRAINT fk_leads_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE SET NULL,
  CONSTRAINT fk_leads_assigned FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 9. VIDEO DOMAIN
-- =========================================================

CREATE TABLE videos (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content_id BIGINT UNSIGNED NULL,
  platform VARCHAR(30) NOT NULL DEFAULT 'youtube',
  external_id VARCHAR(100) NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT NULL,
  thumbnail_url VARCHAR(255) NULL,
  duration_seconds INT UNSIGNED NULL,
  published_at TIMESTAMP NULL,
  metadata JSON NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_videos_platform_external (platform, external_id),
  CONSTRAINT fk_videos_content FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 10. REDIRECTS (SEO TÉCNICO)
-- =========================================================

CREATE TABLE redirects (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  source_path VARCHAR(255) NOT NULL,
  target_url VARCHAR(255) NOT NULL,
  http_status SMALLINT UNSIGNED NOT NULL DEFAULT 301,
  hits INT UNSIGNED NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_redirects_source (source_path)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 11. CONFIGURATION DOMAIN
-- =========================================================

CREATE TABLE settings (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  setting_group ENUM('company','seo','integrations','analytics','social','legal','system') NOT NULL,
  setting_key VARCHAR(150) NOT NULL,
  setting_value TEXT NULL,
  value_type ENUM('string','integer','boolean','json') NOT NULL DEFAULT 'string',
  is_public TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_settings_group_key (setting_group, setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 12. CREDENTIAL DOMAIN (siempre cifrado a nivel de aplicación)
-- =========================================================

CREATE TABLE api_credentials (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_name ENUM('youtube','gtm','ga4','meta') NOT NULL,
  credential_name VARCHAR(150) NOT NULL,
  encrypted_value TEXT NOT NULL,
  environment ENUM('local','staging','production') NOT NULL DEFAULT 'production',
  last_four VARCHAR(4) NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  rotated_at TIMESTAMP NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY uq_credentials_service_name_env (service_name, credential_name, environment)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 13. AUDIT DOMAIN
-- =========================================================

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

-- =========================================================
-- 14. SYSTEM DOMAIN (Laravel Queue estándar)
-- =========================================================

CREATE TABLE jobs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  queue VARCHAR(255) NOT NULL,
  payload LONGTEXT NOT NULL,
  attempts TINYINT UNSIGNED NOT NULL,
  reserved_at INT UNSIGNED NULL,
  available_at INT UNSIGNED NOT NULL,
  created_at INT UNSIGNED NOT NULL,
  KEY idx_jobs_queue (queue)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE failed_jobs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  uuid VARCHAR(255) NOT NULL,
  connection TEXT NOT NULL,
  queue TEXT NOT NULL,
  payload LONGTEXT NOT NULL,
  exception LONGTEXT NOT NULL,
  failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_failed_jobs_uuid (uuid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =========================================================
-- 15. SEEDS MÍNIMOS DE REFERENCIA (roles + verticales)
-- =========================================================

INSERT INTO roles (name, slug, created_at, updated_at) VALUES
('SuperAdmin','superadmin', NOW(), NOW()),
('Administrador','administrador', NOW(), NOW()),
('Editor','editor', NOW(), NOW()),
('Marketing','marketing', NOW(), NOW()),
('Comercial','comercial', NOW(), NOW()),
('Auditor','auditor', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;

-- FIN DEL SCHEMA
-- Compatible con: PROJECT_MANIFEST.md, DATABASE_SPECIFICATION.md v2.0
-- Base de datos objetivo: ngint380_ng2026
