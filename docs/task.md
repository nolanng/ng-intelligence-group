# Tasks para Sprint 1 (Foundation)

- `[/]` 1. Configuración de Entorno y Proyecto Laravel
  - `[x]` 1.1 Crear estructura `mexico/` para archivos personalizados (se asume que Laravel core se generará externamente).
  - `[/]` 1.2 Configurar archivo `.env.example` y configuraciones base (`config/app.php`, `config/hashing.php`, `config/session.php`).

- `[x]` 2. Migraciones y Modelos (Identity Domain)
  - `[x]` 2.1 Migración `create_users_table`, `create_roles_table`, `create_permissions_table`, `create_role_user_table`, `create_permission_role_table`, `create_audit_logs_table`.
  - `[x]` 2.2 Modelos (`User`, `Role`, `Permission`, `AuditLog`).

- `[x]` 3. Arquitectura (Servicios, Repositorios, Listeners)
  - `[x]` 3.1 `UserRepository`, `RoleRepository`.
  - `[x]` 3.2 `AuthService`, `RoleService`.
  - `[x]` 3.3 `AuthAuditListener`.

- `[x]` 4. Controladores, Rutas y Políticas
  - `[x]` 4.1 `AuthController`, `LoginRequest`, `ResetPasswordRequest`.
  - `[x]` 4.2 `UserPolicy`, `RolePolicy`.
  - `[x]` 4.3 Rutas protegidas (`web.php` y `api.php`).
  
- `[x]` 5. Vistas (Blade)
  - `[x]` 5.1 `login.blade.php`, `passwords/email.blade.php`, `passwords/reset.blade.php`.
  
- `[x]` 6. Cierre
  - `[x]` 6.1 Generar `walkthrough.md`.
  - `[x]` 6.2 Generar reporte de Sección 4 final en chat.
