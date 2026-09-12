# Sprint 1 (Foundation) - NG TECHNOLOGY MÉXICO

Provee la base arquitectónica inicial (Laravel 12) del proyecto, configuraciones globales, sistema de autenticación, y roles/permisos iniciales tal como dicta el MVP Backlog.

> [!WARNING]
> **Falta de Archivo:** El documento indica utilizar `docs/schema.sql` como fuente de verdad de la base de datos, pero el archivo no se encuentra en el repositorio ni fue adjunto. En el plan asumo la estructura de `DATABASE_SPECIFICATION.md` pero necesito que confirmes o adjuntes `schema.sql`.

## User Review Required

- Confirmación de si debo generar el proyecto de Laravel 12 en un directorio `mexico/` (como estipula el override aprobado en el manifiesto) y su relación con `public_html`.
- Política de base de datos: dado que no existe `docs/schema.sql`, ¿puedo usar los esquemas definidos en `DATABASE_SPECIFICATION.md` para las entidades de Identity (users, roles, permissions, role_user, permission_role) o vas a adjuntar el `schema.sql`?

## Open Questions

> [!IMPORTANT]
> ¿Puedes proporcionar el archivo `schema.sql` en `docs/` o autorizas la creación de migraciones basándonos en `DATABASE_SPECIFICATION.md`?

## Formato Obligatorio de Entrega (Sección 4) - PROPUESTA

A continuación presento la lista detallada archivo por archivo que se implementará.

### 1. Resumen del módulo implementado
Configuración del esqueleto de Laravel 12, configuración de variables de entorno, migraciones base de identidad, y el módulo completo de autenticación y autorización (roles/permisos) con Laravel session auth.

### 2. Archivos creados o modificados

---

#### [NEW] Infraestructura y Base (Laravel Framework)
- Directorio raíz configurado en `mexico/` (según `PROJECT_MANIFEST.md`).
- Instalación de dependencias (Composer) para Laravel 12.

#### [NEW] `mexico/.env.example`
Plantilla segura para despliegue (se omiten credenciales reales, se usa formato de la sección de Identity).

#### [MODIFY] Modelos (`mexico/app/Models/`)
- `User.php`: Ajuste para soft deletes, relación con roles.
- `Role.php`: Modelo para roles.
- `Permission.php`: Modelo para permisos.

#### [NEW] Repositorios (`mexico/app/Repositories/`)
- `UserRepository.php`
- `RoleRepository.php`

#### [NEW] Servicios (`mexico/app/Services/`)
- `AuthService.php`
- `RoleService.php`

#### [NEW] Controladores (`mexico/app/Http/Controllers/`)
- `AuthController.php` (login, logout, recuperación)

#### [NEW] Rutas (`mexico/routes/web.php` & `mexico/routes/api.php`)
- Definición de rutas protegidas y middleware de roles.

#### [NEW] Vistas Blade (`mexico/resources/views/auth/`)
- `login.blade.php`
- `passwords/email.blade.php`
- `passwords/reset.blade.php`

### 3. Migraciones involucradas
- `create_users_table` (modificada según spec)
- `create_roles_table`
- `create_permissions_table`
- `create_role_user_table`
- `create_permission_role_table`
- (Otras que defina `schema.sql` si es provisto)

### 4. Variables de entorno requeridas
- `APP_NAME="NG Intelligence Group"`
- `APP_ENV=local` (o production)
- `APP_DEBUG=true`
- `DB_CONNECTION=mysql`
- `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (vacíos en example).

### 5. Instrucciones de instalación
1. Clonar repo/bajar código.
2. `cd mexico`
3. `composer install`
4. `cp .env.example .env` (llenar datos DB)
5. `php artisan key:generate`
6. `php artisan migrate --seed` (seeding roles base)

### 6. Pruebas automatizadas
- Tests unitarios en `mexico/tests/Unit/RoleTest.php`.
- Feature tests en `mexico/tests/Feature/AuthTest.php`.

### 7. Pruebas manuales
- Acceso a `/login`, comprobación de bloqueo a usuarios no autorizados, verificación de sesión.

### 8. Criterios de aceptación cubiertos
- US-001 Configurar Laravel 12.
- US-002 Configurar autenticación.
- US-003 Sistema de roles (SuperAdmin, Administrador, Editor, Marketing, Comercial, Auditor).
- US-004 Sistema de permisos.

### 9. Riesgos o elementos pendientes de validación
- **RIESGO:** `docs/schema.sql` no existe en el repositorio actual.
- **PENDIENTE:** `TODO: REQUIERE CONTENIDO APROBADO` (Textos exactos de la pantalla de Login si aplican a nivel marca).

## Verification Plan
Correr `php artisan test` para confirmar la suite de Auth.
Verificar manualmente la base de datos de usuarios (con tinker) que inserte roles y permisos correctamente.
