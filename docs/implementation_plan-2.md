# Sprint 1 (Foundation) - NG TECHNOLOGY MÉXICO - Plan Actualizado

Provee la base arquitectónica inicial (Laravel 12) del proyecto, configuraciones globales, sistema de autenticación, y roles/permisos iniciales tal como dicta el MVP Backlog, incorporando de manera estricta las directivas de seguridad.

## User Review Required

- **Argon2id (Hashing):** Se configurará `config/hashing.php` con el driver `argon`. *Riesgo asociado:* No puedo confirmar desde este entorno local de Windows si la compilación de PHP 8.2+ en el servidor cPanel final soporta Argon2id nativamente. Si en producción arroja error "Argon2i algorithm is not supported", deberás pedir al soporte del hosting que habilite la extensión en su selector de PHP.

## Formato Obligatorio de Entrega (Sección 4) - PROPUESTA

A continuación presento la lista detallada archivo por archivo que se implementará.

### 1. Resumen del módulo implementado
Configuración del esqueleto de Laravel 12 en el directorio `mexico/`, variables de entorno seguras, migraciones exactas del Identity Domain y Audit Domain obtenidas de `schema.sql`. Se integra autenticación con sesión segura, políticas de contraseña robustas (12+ caracteres, mix de caracteres y uncompromised), throttling de 10 rpm para auth, hashing Argon2id, Policies con Gates por permiso y listener de auditoría para LOGIN/LOGOUT.

### 2. Archivos creados o modificados

---

#### [NEW] Infraestructura y Base
- Instalación de Laravel 12 en directorio `mexico/`.

#### [MODIFY] Configuraciones Base (`mexico/config/`)
- `hashing.php`: Configurado para usar el driver `argon`.
- `session.php`: Configurado para sesiones seguras (`secure` => true, `http_only` => true, `same_site` => 'lax').
- `app.php`: Locale configurado a `es-MX`, timezone a `America/Mexico_City`.

#### [NEW] `.env.example`
Plantilla segura para despliegue que incluye `APP_URL`, `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `QUEUE_CONNECTION=database` y deja `APP_DEBUG=` vacío (no true, con comentario de seguridad).

#### [MODIFY] Modelos (`mexico/app/Models/`)
- `User.php`: Ajuste para soft deletes, relación con roles.
- `Role.php`: Modelo para roles.
- `Permission.php`: Modelo para permisos.
- `AuditLog.php`: Nuevo modelo para los logs de auditoría de auth.

#### [NEW] Requests y Validaciones (`mexico/app/Http/Requests/`)
- `Auth/LoginRequest.php`: Validaciones para login.
- `Auth/ResetPasswordRequest.php`: Enforce estricto de password policy (12 caracteres, mayúsculas, minúsculas, números, símbolos, uncompromised).

#### [NEW] Controladores y Rutas (`mexico/app/Http/Controllers/`, `mexico/routes/`)
- `AuthController.php`: Manejo de auth.
- `routes/web.php`: Rutas protegidas, aplicando middleware de `throttle:10,1` (10 rpm) para rutas de login y recuperación.

#### [NEW] Políticas de Autorización (`mexico/app/Policies/`)
- `UserPolicy.php`: Define accesos de usuarios basados en Gates de permisos específicos (ej. `Gate::allows('users.view')`), sin comparar roles directos.
- `RolePolicy.php`: Define accesos de gestión de roles.

#### [NEW] Servicios y Listeners (`mexico/app/Services/`, `mexico/app/Listeners/`)
- `AuthService.php`, `RoleService.php`
- `AuthAuditListener.php`: Escucha eventos de `Illuminate\Auth\Events\Login` y `Logout` para insertar un registro en la tabla `audit_logs` desde el día uno.

#### [NEW] Vistas Blade (`mexico/resources/views/auth/`)
- `login.blade.php`, `passwords/email.blade.php`, `passwords/reset.blade.php`

### 3. Migraciones involucradas (Exactas de `docs/schema.sql`)
- `create_roles_table`
- `create_permissions_table`
- `create_users_table`
- `create_role_user_table`
- `create_permission_role_table`
- `create_audit_logs_table` (para LOGIN/LOGOUT en el Sprint 1)

### 4. Variables de entorno requeridas
- `APP_NAME="NG Intelligence Group"`
- `APP_ENV=local`
- `APP_DEBUG=` (Vacio para asegurar que no quede true accidentalmente)
- `APP_URL=https://ngintelligencegroup.com`
- `DB_CONNECTION=mysql`
- `QUEUE_CONNECTION=database`
- `MAIL_MAILER=smtp`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION`, `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME`

### 5. Instrucciones de instalación
1. `cd mexico`
2. `composer install`
3. `cp .env.example .env` (llenar DB y Mail)
4. `php artisan key:generate`
5. `php artisan migrate --seed` (Roles y permisos base)

### 6. Pruebas automatizadas
- Feature tests en `mexico/tests/Feature/AuthSecurityTest.php` comprobando rate limits, password policies y argon hashing.

### 7. Pruebas manuales
- Intentos de fuerza bruta de login para confirmar el bloqueo (Throttle).
- Verificación del log de auditoría en la BD tras iniciar y cerrar sesión.

### 8. Criterios de aceptación cubiertos
- US-001 Configurar Laravel 12 (con locale, timezone y session seguras).
- US-002 Autenticación (incluyendo requerimientos complejos de contraseñas).
- US-003 y US-004 Roles/Permisos (implementados con Policies por Gates).

### 9. Riesgos o elementos pendientes de validación
- **RIESGO EN PRODUCCIÓN (Argon2id):** Tal como se indicó en "User Review Required", confirmar compatibilidad nativa en el servidor cPanel de despliegue final.
- **BLOQUEO LOCAL DETECTADO:** Ni `php` ni `composer` están instalados o en el PATH del entorno actual, lo que bloqueará la ejecución de este plan (creación del proyecto) hasta ser instalados.
- **PENDIENTE:** `TODO: REQUIERE CONTENIDO APROBADO` en las vistas Blade donde aplique contenido real.

## Verification Plan
1. Correr la creación del proyecto y generar la estructura.
2. Confirmar que `password_verify` y `Hash::make()` utilicen internamente Argon2id (en caso de que el entorno permita ejecutar código una vez se instale PHP).
3. Inspeccionar el código generado para confirmar el driver de session, middleware de throttle en rutas, requests y uso de policies.
