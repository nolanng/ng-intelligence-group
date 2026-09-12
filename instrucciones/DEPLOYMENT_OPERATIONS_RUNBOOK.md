# DEPLOYMENT_OPERATIONS_RUNBOOK.md

# NG TECHNOLOGY MÉXICO
## Manual Maestro de Despliegue, Operaciones y Soporte
### Versión 2.0
### Compatible con todos los documentos maestros

---

# 1. PROPÓSITO

Este documento define los procedimientos oficiales para:

- Despliegues
- Operaciones
- Soporte
- Monitoreo
- Recuperación
- Backups
- Incidentes
- Continuidad Operativa

del ecosistema NG TECHNOLOGY México.

Este documento será utilizado por:

```text
Project Managers

DevOps

Arquitectos

Desarrolladores

Administradores

Soporte
```

---

# 2. OBJETIVOS

## Operativos

```yaml
Alta disponibilidad

Estabilidad

Seguridad

Recuperación rápida
```

---

## Negocio

```yaml
Mantener generación de Leads

Mantener visibilidad SEO

Mantener continuidad comercial
```

---

# 3. ENTORNOS OFICIALES

## Local

```yaml
Uso:
Desarrollo
```

---

## Staging

```yaml
Uso:
QA
Validaciones
Pruebas finales
```

---

## Production

```yaml
Uso:
Clientes reales
Leads reales
Operación real
```

---

# 4. INFRAESTRUCTURA OBJETIVO

## Hosting

```yaml
cPanel
```

---

## Web Server

```yaml
Apache 2.4+
```

---

## PHP

```yaml
PHP 8.2+
```

---

## Database

```yaml
MySQL 8
MariaDB 10.6+
```

---

## SSL

```yaml
Obligatorio
```

---

# 5. ESTRUCTURA DE DIRECTORIOS

```text
/home/account

├── ng_mexico_app
├── backups
├── logs
└── public_html
```

---

## Directorio Privado

```text
ng_mexico_app
```

Contiene:

```text
app
bootstrap
config
database
resources
routes
storage
vendor
.env
```

---

## Directorio Público

```text
public_html
```

Contiene únicamente:

```text
index.php
assets
robots.txt
favicon
uploads públicos autorizados
```

---

# 6. VARIABLES DE ENTORNO

## Archivo

```text
.env
```

---

## Reglas

Nunca:

```yaml
Versionar

Compartir

Publicar
```

---

## Variables críticas

```env
APP_ENV

APP_DEBUG

APP_URL

DB_HOST

DB_DATABASE

DB_USERNAME

DB_PASSWORD

MAIL_HOST

MAIL_USERNAME

MAIL_PASSWORD

YOUTUBE_API_KEY
```

---

# 7. CONFIGURACIÓN INICIAL

## Checklist

```text
PHP 8.2+

Composer

MySQL

SSL

Cron

Permisos Storage

Permisos Cache
```

---

# 8. INSTALACIÓN

## Paso 1

Clonar proyecto.

---

## Paso 2

Instalar dependencias.

```bash
composer install
```

---

## Paso 3

Copiar .env

```bash
cp .env.example .env
```

---

## Paso 4

Generar clave.

```bash
php artisan key:generate
```

---

## Paso 5

Migraciones.

```bash
php artisan migrate
```

---

## Paso 6

Seeders.

```bash
php artisan db:seed
```

---

# 9. DESPLIEGUE PRODUCTIVO

## Flujo

```text
Develop

↓

QA

↓

Staging

↓

Approval

↓

Production
```

---

# 10. PRE DEPLOY CHECKLIST

Antes de desplegar:

✅ Código revisado

✅ Tests ejecutados

✅ Migraciones revisadas

✅ Sitemap validado

✅ Seguridad validada

✅ Backup disponible

✅ Documentación actualizada

✅ APP_DEBUG=false

---

# 11. COMANDOS RELEASE

```bash
composer install --no-dev

php artisan migrate --force

php artisan optimize:clear

php artisan config:cache

php artisan route:cache

php artisan view:cache
```

---

# 12. POST DEPLOY CHECKLIST

Validar:

✅ Home

✅ Soluciones

✅ Leads

✅ Login

✅ Sitemap

✅ Robots

✅ Videos

✅ Dashboard

---

# 13. HEALTH CHECKS

## Home

```http
GET /
```

Debe responder:

```yaml
200
```

---

## Sitemap

```http
GET /sitemap.xml
```

Debe responder:

```yaml
200
```

---

## Robots

```http
GET /robots.txt
```

Debe responder:

```yaml
200
```

---

# 14. MONITOREO

Monitorear:

```yaml
Disponibilidad

Errores

Logs

Base de Datos

Correos

Leads

Cron
```

---

# 15. LOGGING

Ubicación:

```text
storage/logs
```

---

Niveles:

```yaml
Info

Warning

Error

Critical
```

---

# 16. MANEJO DE INCIDENTES

## Severidad 1

Sistema totalmente caído.

Ejemplos:

```text
Home caída

Leads no funcionan

Database caída
```

---

## Severidad 2

Funcionalidad importante afectada.

---

## Severidad 3

Funcionalidad secundaria.

---

## Severidad 4

Cosmético.

---

# 17. PROCEDIMIENTO INCIDENTE CRÍTICO

## Paso 1

Confirmar impacto.

---

## Paso 2

Revisar logs.

---

## Paso 3

Revisar database.

---

## Paso 4

Revisar deployment reciente.

---

## Paso 5

Aplicar rollback si aplica.

---

# 18. ROLLBACK

## Condiciones

Aplicar rollback cuando:

```yaml
Hay pérdida funcional

Errores críticos

Riesgo operacional
```

---

## Requisitos

```text
Backup previo

Version anterior disponible
```

---

# 19. BACKUPS

## Base de Datos

Frecuencia:

```yaml
Diaria
```

---

## Archivos

Frecuencia:

```yaml
Semanal
```

---

## Snapshot Completo

Frecuencia:

```yaml
Mensual
```

---

# 20. POLÍTICA DE RETENCIÓN

## Database

```yaml
30 días
```

---

## Backups completos

```yaml
12 meses
```

---

## Logs

```yaml
90 días
```

---

# 21. RECUPERACIÓN

## Objetivo

Recuperar:

```yaml
Portal

Base de Datos

Leads

CMS
```

---

## Procedimiento

```text
Restaurar Backup

Validar Integridad

Regenerar Cache

Validar Frontend

Validar Leads
```

---

# 22. CRON JOBS

## Laravel Scheduler

```cron
* * * * * php artisan schedule:run
```

---

## YouTube Sync

```yaml
12 horas
```

---

## Sitemap Refresh

```yaml
Automático
```

---

# 23. GESTIÓN DE USUARIOS

Roles:

```text
SuperAdmin

Administrador

Editor

Marketing

Comercial

Auditor
```

---

# 24. POLÍTICA DE CONTRASEÑAS

Requisitos:

```yaml
12 caracteres

Mayúsculas

Minúsculas

Números

Símbolos
```

---

# 25. SEGURIDAD OPERATIVA

Verificar:

```yaml
HTTPS

SSL

CSRF

CSP

Rate Limiting

Policies
```

---

# 26. VALIDACIÓN SEO OPERATIVA

Verificar:

```text
Metadata

Canonical

Schema

Robots

Sitemap
```

---

# 27. VALIDACIÓN GEO OPERATIVA

Verificar:

```text
Organization Schema

Service Schema

FAQ Schema

VideoObject
```

---

# 28. VALIDACIÓN YOUTUBE

Verificar:

✅ API activa

✅ Sincronización

✅ Videos visibles

✅ Sin errores

---

# 29. VALIDACIÓN LEADS

Verificar:

✅ Formularios

✅ Persistencia

✅ Notificación

✅ Pipeline

✅ UTM

---

# 30. PLAN DE CONTINUIDAD

Si YouTube falla:

```text
Mantener videos existentes
```

---

Si SMTP falla:

```text
Continuar guardando leads
```

---

Si Sync falla:

```text
Mantener última versión válida
```

---

# 31. MATRIZ DE RESPONSABILIDAD

| Actividad | Responsable |
|------------|-------------|
| Deploy | Tech Lead |
| QA | QA Team |
| SEO | SEO Lead |
| Seguridad | Arquitectura |
| Backup | DevOps |
| Producción | Dirección Proyecto |

---

# 32. CHECKLIST GO LIVE

✅ SSL activo

✅ Robots validado

✅ Sitemap válido

✅ Leads funcionando

✅ YouTube funcionando

✅ Roles funcionando

✅ Backups configurados

✅ Cron activo

✅ Logs operativos

✅ SEO operativo

✅ GEO operativo

✅ Performance validada

---

# 33. SLA INTERNO

## Disponibilidad Objetivo

```yaml
99%
```

---

## Respuesta Incidente Crítico

```yaml
Inmediata
```

---

## Restauración

```yaml
Según procedimiento DR
```

---

# 34. FUNCIONALIDADES FUTURAS

Preparado para:

```text
Marketplace

Portal Cliente

LMS

Directorio Empresarial
```

---

No implementar.

---

# 35. DEFINICIÓN DE PRODUCCIÓN ESTABLE

El sistema se considera estable cuando:

✅ Sin errores críticos

✅ Sin errores altos

✅ Leads funcionales

✅ SEO funcional

✅ GEO funcional

✅ Backups funcionando

✅ Logs funcionando

✅ QA aprobada

---

# 36. CRITERIOS DE ACEPTACIÓN

✅ Compatible con Laravel 12

✅ Compatible con cPanel

✅ Compatible con Apache

✅ Compatible con PHP 8.2+

✅ Compatible con MySQL 8

✅ Compatible con todos los documentos maestros

✅ Preparado para producción

✅ Preparado para operación continua

---

# 37. APROBACIÓN

```yaml
document: DEPLOYMENT_OPERATIONS_RUNBOOK.md
version: 2.0
status: final
parent_document: PROJECT_MANIFEST.md
requires_change_control: true
```

---

# FIN DEL DOCUMENTO

```text
DEPLOYMENT_OPERATIONS_RUNBOOK.md
Version 2.0
Status: Approved Operations Baseline
```