# Corrección de Inicialización y Setup Completo (Sprint 1)

El entorno requiere la inicialización real de un proyecto Laravel y la configuración completa de base de datos y tests para validar lo desarrollado.

## User Review Required
> [!IMPORTANT]
> El plan eliminará y recreará el proyecto en `d:\NG Group\mexico`. Por favor confirma si estás de acuerdo con que los archivos sean respaldados en `d:\NG Group\_backup_sprint1\`. Además, confirma que MySQL en XAMPP está activo, ya que crearé la base de datos `ng_intelligence_local` conectándome a él.

## Proposed Changes

### 1. Respaldo y Limpieza
- Moveremos `app/`, `routes/`, `resources/`, `database/`, y `.env.example` desde `d:\NG Group\mexico\` hacia `d:\NG Group\_backup_sprint1\`.
- Vaciaremos `d:\NG Group\mexico\`.

### 2. Inicialización de Laravel
- Ejecutar el comando de composer desde `d:\NG Group`: `composer create-project laravel/laravel mexico "^12.0"`
- Validaremos que se generen correctamente los directorios y `artisan`.

### 3. Fusión de Código y Configuración
- Copiaremos el contenido respaldado a `mexico\`.
- Realizaremos el registro (Bindings) de `UserRepository` y `RoleRepository` en `AppServiceProvider`.
- Registraremos `AuthAuditListener` para los eventos `Login` y `Logout` en `EventServiceProvider`.

### 4. Base de Datos
- Ejecutar comando para crear la base de datos `ng_intelligence_local` localmente mediante la terminal (MySQL).
- Configurar `.env` basándonos en `.env.example`.
- Generar la key: `php artisan key:generate`.
- Ejecutar migraciones con Seed: `php artisan migrate --seed`.

### 5. Tests
- Crear tests básicos para los modelos y repositorios.
- Ejecutar `php artisan test`.
- Realizar captura (reporte) de la salida real del test y el estado de la base de datos.
- Commit y Push finales.

## Verification Plan
### Automated Tests
- `php artisan test` validará los componentes de Auth e Identity.

### Manual Verification
- Revisaré visualmente que `mexico\vendor` y el scaffold de Laravel existan.
- Validaremos que las tablas y roles (seeder) se inserten en MySQL.
