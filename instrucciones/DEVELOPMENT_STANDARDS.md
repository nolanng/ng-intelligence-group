# DEVELOPMENT_STANDARDS.md

# NG TECHNOLOGY MÉXICO
## Estándares Oficiales de Desarrollo
### Versión 2.0
### Compatible con PROJECT_MANIFEST v2.0
### Compatible con SYSTEM_ARCHITECTURE v2.0
### Compatible con DATABASE_SPECIFICATION v2.0
### Compatible con UI_UX_SPECIFICATION v2.0
### Compatible con SEO_GEO_SPECIFICATION v2.0

---

# 1. PROPÓSITO

Este documento define los estándares obligatorios para:

- Desarrollo Backend
- Desarrollo Frontend
- Arquitectura
- Seguridad
- Base de Datos
- Integraciones
- SEO Técnico
- Testing
- DevOps
- Calidad de Código

Todas las implementaciones generadas por desarrolladores humanos o inteligencia artificial deben cumplir este documento.

---

# 2. REGLAS OBLIGATORIAS PARA LA IA

La IA deberá:

✅ Generar código funcional

✅ Generar migraciones

✅ Generar seeders

✅ Generar tests

✅ Generar documentación

✅ Utilizar Laravel 12

✅ Utilizar PHP 8.2+

✅ Seguir PSR-12

✅ Utilizar arquitectura definida

✅ Cumplir SEO y GEO

✅ Cumplir accesibilidad

✅ Cumplir seguridad

---

## Prohibido

```text
Pseudocódigo

placeholders funcionales

TODO sin justificación

código muerto

secretos hardcoded

credenciales embebidas
```

---

# 3. TECNOLOGÍA OFICIAL

## Backend

```yaml
PHP: 8.2+

Laravel: 12
```

---

## Frontend

```yaml
Blade

TailwindCSS

AlpineJS

Vanilla JS
```

---

## Base de Datos

```yaml
MySQL 8

MariaDB 10.6+
```

---

## Hosting

```yaml
Apache

cPanel
```

---

# 4. ARQUITECTURA DE APLICACIÓN

Patrón obligatorio:

```text
Controller

↓

Service

↓

Repository

↓

Model

↓

Database
```

---

## Controllers

Responsabilidad:

```yaml
Recibir requests

Retornar responses

Autorización
```

---

## Controllers NO deben

```yaml
Contener lógica compleja

Construir queries complejos

Integrarse a APIs externas
```

---

# 5. SERVICE LAYER

Toda lógica de negocio debe ir en:

```text
app/Services
```

---

Ejemplo:

```text
LeadService

SEOService

YouTubeSyncService

SolutionService
```

---

Responsabilidades:

```yaml
Business Rules

Workflows

External Integrations
```

---

# 6. REPOSITORY LAYER

Ubicación:

```text
app/Repositories
```

---

Responsabilidad:

```yaml
Persistencia

Consultas

Filtros
```

---

No contiene:

```yaml
Business Logic
```

---

# 7. MODELS

Ubicación:

```text
app/Models
```

---

Responsabilidades:

```yaml
Relations

Scopes

Casts

Mutators
```

---

No incluir:

```yaml
Servicios

Lógica compleja
```

---

# 8. NAMING CONVENTIONS

## Clases

```php
LeadService
```

---

## Métodos

```php
createLead()

publishArticle()

syncVideos()
```

---

## Variables

```php
$lead

$article

$youtubeVideo
```

---

## Constantes

```php
LEAD_STATUS_NEW
```

---

# 9. ESTRUCTURA DE DIRECTORIOS

```text
app/

├── Http
├── Models
├── Services
├── Repositories
├── Policies
├── Jobs
├── Events
├── Listeners
├── Mail
├── Notifications
└── Support
```

---

# 10. ESTÁNDAR DE BASE DE DATOS

## Tablas

```yaml
snake_case
plural
```

---

Correcto:

```text
form_submissions

content_sections
```

---

Incorrecto:

```text
FormSubmission

contentSection
```

---

## Campos

```yaml
snake_case
```

---

Correcto:

```text
published_at

created_at
```

---

# 11. MIGRACIONES

Obligatorio:

```php
Schema::create(...)
```

---

Todas deben incluir:

```yaml
Foreign Keys

Indexes

Rollback
```

---

Prohibido:

```yaml
Migraciones irreversibles
```

---

# 12. SEEDERS

Crear seeders para:

```text
Roles

Permissions

Verticales

Configuraciones básicas
```

---

No insertar:

```text
Leads reales

Clientes reales
```

---

# 13. VALIDACIONES

Utilizar:

```php
Form Requests
```

---

Ubicación:

```text
app/Http/Requests
```

---

Prohibido:

```php
$request->validate(...)
```

en controladores complejos.

---

# 14. AUTORIZACIÓN

## Obligatorias

```yaml
Policies

Gates

Roles
```

---

No utilizar:

```yaml
if(auth()->user()->role)
```

repetidamente.

---

# 15. SEGURIDAD

## Sesiones

```yaml
Secure

HttpOnly

SameSite
```

---

## HTTPS

Obligatorio.

---

## Hashing

```yaml
Argon2id
```

---

## Protección

```yaml
CSRF

XSS

CSP

Rate Limiting
```

---

# 16. MANEJO DE SECRETOS

Nunca almacenar:

```yaml
API Keys

Tokens

Passwords
```

---

Ubicación:

```yaml
.env
```

---

Config:

```php
config/services.php
```

---

# 17. MANEJO DE ERRORES

Toda excepción debe:

```yaml
Loggear

Controlarse

Notificarse cuando aplique
```

---

Prohibido:

```php
dd()

die()

dump()
```

en producción.

---

# 18. LOGGING

Utilizar:

```php
Log::info()

Log::warning()

Log::error()

Log::critical()
```

---

No registrar:

```yaml
Contraseñas

Secrets

Tokens
```

---

# 19. INTEGRACIONES

Toda integración externa debe usar:

```text
Service

↓

Connector

↓

Adapter
```

---

Ejemplos:

```text
YouTube

GA4

SMTP
```

---

Nunca llamar APIs desde Blade.

---

# 20. JOBS

Utilizar Jobs para:

```yaml
Emails

Sincronizaciones

Procesos largos
```

---

Ejemplo:

```php
SyncYouTubeVideosJob
```

---

# 21. FRONTEND STANDARDS

## Blade

Obligatorio.

---

No usar:

```yaml
React SPA

Angular

Vue SPA
```

---

## Componentes

Ubicación:

```text
resources/views/components
```

---

Ejemplo:

```text
hero.blade.php

cta.blade.php

faq.blade.php
```

---

# 22. TAILWIND STANDARDS

Utilizar:

```yaml
Design Tokens
```

---

Evitar:

```yaml
Valores arbitrarios repetidos
```

---

Correcto:

```html
bg-brand-800
```

---

# 23. JAVASCRIPT STANDARDS

## Preferencia

```yaml
Vanilla JS
```

---

## Interactividad

```yaml
AlpineJS
```

---

## Animaciones

```yaml
IntersectionObserver

CSS
```

---

GSAP:

```yaml
Lazy Loaded
```

únicamente cuando sea necesario.

---

# 24. SEO STANDARDS

Toda página debe tener:

```yaml
Title

Meta Description

Canonical

OpenGraph

Schema
```

---

Utilizar:

```yaml
Breadcrumbs

FAQ

Entity SEO
```

---

# 25. GEO STANDARDS

Contenido preparado para:

```text
ChatGPT

Gemini

Copilot

Claude

Perplexity
```

---

Incluir:

```yaml
Definiciones

FAQs

Pasos

Conclusiones
```

---

# 26. ACCESSIBILITY STANDARDS

Objetivo:

```yaml
WCAG 2.2 AA
```

---

Obligatorio:

```yaml
Focus States

Keyboard Navigation

Aria Labels

Skip Navigation
```

---

# 27. PERFORMANCE STANDARDS

Objetivos:

```yaml
Lighthouse > 90

LCP < 2.5s

CLS < 0.1

INP < 200ms
```

---

Obligatorio:

```yaml
Lazy Loading

WebP

AVIF

Cached Routes

Cached Views
```

---

# 28. TESTING STANDARDS

## Feature Tests

```php
tests/Feature
```

---

## Unit Tests

```php
tests/Unit
```

---

Cobertura mínima:

```yaml
Authentication

Authorization

Leads

SEO

CMS

Forms
```

---

# 29. CI/CD READY

Todo código debe poder ser:

```yaml
Tested

Built

Deployed
```

sin modificaciones manuales.

---

# 30. DOCUMENTATION STANDARDS

Cada módulo debe incluir:

```text
Objetivo

Dependencias

Flujo

Rutas

Permisos

Eventos

Pruebas
```

---

# 31. COMMITS

Formato:

```text
feat:

fix:

refactor:

test:

docs:
```

---

Ejemplo:

```text
feat: add lead pipeline module
```

---

# 32. CÓDIGO PROHIBIDO

```php
dd();

dump();

var_dump();

print_r();
```

---

Prohibido:

```yaml
Queries sin índices

HTML inline masivo

SQL hardcoded innecesario

Secrets hardcoded
```

---

# 33. CHECKLIST PRE-DEPLOY

✅ Tests exitosos

✅ Cache compilado

✅ APP_DEBUG=false

✅ HTTPS

✅ Robots revisado

✅ Sitemap generado

✅ Logs limpios

✅ Variables configuradas

✅ Backups disponibles

---

# 34. DEFINITION OF DONE

Un módulo está terminado cuando:

✅ Funciona

✅ Tiene validaciones

✅ Tiene permisos

✅ Tiene tests

✅ Tiene documentación

✅ Tiene logging

✅ Tiene manejo de errores

✅ Cumple SEO

✅ Cumple GEO

✅ Cumple accesibilidad

✅ Cumple seguridad

✅ Compatible con cPanel

---

# 35. CRITERIOS DE ACEPTACIÓN

✅ Compatible con Laravel 12

✅ Compatible con PHP 8.2+

✅ Compatible con MySQL 8

✅ Compatible con Apache

✅ Compatible con cPanel

✅ Compatible con PROJECT_MANIFEST

✅ Compatible con SYSTEM_ARCHITECTURE

✅ Compatible con DATABASE_SPECIFICATION

✅ Compatible con UI_UX_SPECIFICATION

✅ Compatible con SEO_GEO_SPECIFICATION

✅ Preparado para desarrollo asistido por IA

---

# FIN DEL DOCUMENTO

Archivo:

```text
DEVELOPMENT_STANDARDS.md
Version 2.0
Status: Approved Development Baseline
```