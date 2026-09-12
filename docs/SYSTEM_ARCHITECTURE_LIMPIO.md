
# SYSTEM_ARCHITECTURE_V2.md

# NG TECHNOLOGY MÉXICO
## Arquitectura Empresarial del Sistema
### Versión 2.0
### Compatible con PROJECT_MANIFEST v2.0

---

# 1. PROPÓSITO DEL DOCUMENTO

Este documento define la arquitectura técnica completa del ecosistema digital NG TECHNOLOGY México.

Su objetivo es servir como referencia única para:

- Arquitectos de software.
- Desarrolladores backend.
- Desarrolladores frontend.
- Ingenieros DevOps.
- Especialistas SEO.
- Equipos QA.
- Sistemas de generación de código mediante IA.

Este documento complementa:

```text
PROJECT_MANIFEST.md
DATABASE_SPECIFICATION.md
UI_UX_SPECIFICATION.md
```

No redefine reglas de negocio.

Implementa técnicamente el manifiesto principal.

---

# 2. PRINCIPIOS ARQUITECTÓNICOS

## 2.1 Single Source of Truth

Toda decisión funcional proviene del:

```text
PROJECT_MANIFEST.md
```

Ningún módulo puede contradecirlo.

---

## 2.2 Modular Monolith

Arquitectura obligatoria:

```yaml
Pattern:
Modular Monolith

Framework:
Laravel 12
```

No utilizar:

```yaml
Microservices
Service Mesh
Kubernetes
```

---

## 2.3 SEO First

La plataforma debe construirse para:

```yaml
Google
Bing
ChatGPT Search
Gemini
Copilot
Perplexity
Claude Search
```

La indexabilidad es una característica nativa, no un agregado posterior.

---

## 2.4 Performance First

Todo componente debe cumplir:

```yaml
LCP < 2.5s

CLS < 0.1

INP < 200ms

Lighthouse > 90
```

---

## 2.5 CMS Driven

Ninguna landing page debe depender de código hardcoded.

Todo contenido debe administrarse desde CMS.

---

## 2.6 Security By Design

Toda funcionalidad debe considerar:

```yaml
Authentication
Authorization
Auditability
Traceability
```

desde el primer sprint.

---

# 3. CONTEXT DIAGRAM

```text
                    ┌───────────────────┐
                    │     Visitantes    │
                    └─────────┬─────────┘
                              │
                              ▼
                 ┌─────────────────────────┐
                 │ Portal NG TECHNOLOGY MX │
                 └─────────┬───────────────┘
                           │
      ┌────────────────────┼────────────────────┐
      ▼                    ▼                    ▼

Soluciones         Contenidos            Formularios

      ▼                    ▼                    ▼

 SEO/GEO           YouTube Hub         Lead Pipeline

      └──────────────┬──────────────────────────┘
                     ▼

          Laravel Business Layer

                     ▼

               MySQL 8.0

                     ▼

          CMS Administrativo
```

---

# 4. ARQUITECTURA LÓGICA

## Capas

```text
Presentation Layer

Application Layer

Domain Layer

Infrastructure Layer

Persistence Layer
```

---

## Flujo General

```text
Usuario

↓

Frontend

↓

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

# 5. ARQUITECTURA FÍSICA

## Infraestructura Objetivo

```yaml
Hosting:
cPanel

Web Server:
Apache

PHP:
8.2+

Database:
MySQL 8

Filesystem:
Local

SSL:
Required
```

---

## Estructura

```text
Internet

↓

Apache

↓

Laravel Public

↓

Laravel Core

↓

MySQL
```

---

# 6. DOMAIN ARCHITECTURE

La solución se divide en dominios.

---

## Corporate Domain

Responsable de:

```yaml
Homepage
About
Contact
Corporate Information
```

---

## Solutions Domain

Responsable de:

```yaml
15 Verticales
Landing Pages
CTA
Conversión
```

---

## Content Domain

Responsable de:

```yaml
Blog
Recursos
Webinars
Casos de Éxito
```

---

## Video Domain

Responsable de:

```yaml
Canal YouTube
Videos
Playlists
```

---

## Lead Domain

Responsable de:

```yaml
Captura
Clasificación
Asignación
Seguimiento
```

---

## SEO Domain

Responsable de:

```yaml
Metadata
Structured Data
Sitemap
Robots
Redirects
```

---

## Identity Domain

Responsable de:

```yaml
Usuarios
Roles
Permisos
```

---

## Audit Domain

Responsable de:

```yaml
Trazabilidad
Historial
Cumplimiento
```

---

# 7. APPLICATION ARCHITECTURE

## Organización

```text
app/

├── Http
├── Models
├── Services
├── Repositories
├── Policies
├── Providers
├── Traits
├── Jobs
├── Events
└── Mail
```

---

## Pattern

```yaml
Controller
↓
Service
↓
Repository
↓
Model
```

---

## Controllers

Responsabilidad:

```yaml
HTTP
Validation Delegation
Responses
```

No contienen:

```yaml
Business Logic
```

---

## Services

Responsabilidad:

```yaml
Business Rules
Workflows
Integrations
```

---

## Repositories

Responsabilidad:

```yaml
Queries
Persistence
```

---

## Models

Responsabilidad:

```yaml
Relationships
Scopes
Casts
```

---

# 8. FRONTEND ARCHITECTURE

## Stack

```yaml
Blade
TailwindCSS
AlpineJS
Vanilla JS
```

---

## Renderizado

```yaml
SSR

Server Side Rendering
```

No SPA.

---

## Recursos

```yaml
CSS compilado
JS comprimido
Imágenes optimizadas
```

---

## Animaciones

Permitidas:

```yaml
Fade
Slide
Reveal
Counter
Accordion
```

---

## GSAP

Uso:

```yaml
Opcional
```

Sólo:

```yaml
Hero
Reveal
Counter
```

Carga:

```yaml
Lazy Loaded
```

---

# 9. CMS ARCHITECTURE

## Modelo

```yaml
Component Builder
```

No:

```yaml
Page Builder libre
```

---

## Secciones Disponibles

```text
Hero

Text

Features

Benefits

Stats

FAQ

CTA

Video

Form

Resources

Related Content
```

---

## Flujo Editorial

```text
Draft

↓

Review

↓

Approved

↓

Scheduled

↓

Published
```

---

## Gestión

```yaml
Pages
Solutions
Resources
Blog
Videos
FAQ
SEO
Media
Forms
```

---

# 10. LEAD MANAGEMENT ARCHITECTURE

## Objetivo

Convertir tráfico en oportunidades de negocio.

---

## Flujo

```text
Visitante

↓

Landing

↓

Formulario

↓

Validación

↓

Lead

↓

Asignación

↓

Seguimiento
```

---

## Pipeline

```yaml
New

Assigned

Contacted

Qualified

Proposal

Won

Lost

Discarded
```

---

## Persistencia

Guardar:

```yaml
Lead
UTMs
Landing
Vertical
Timestamp
```

---

## Reglas

Todo lead debe:

```yaml
Tener origen

Tener vertical

Tener fecha

Tener formulario asociado
```

---

# 11. CONTENT ARCHITECTURE

## Tipos

```yaml
Page

Solution

Article

Video

FAQ

Landing

Case Study

Resource
```

---

## Relación

```text
Content

↓

Sections

↓

SEO

↓

Media
```

---

## Versionado

Mantener:

```yaml
Author
Modified By
Modified Date
Status
```

---

# 12. YOUTUBE ARCHITECTURE

## Objetivo

Convertir contenido educativo en generación de demanda.

---

## Integración

```text
YouTube API

↓

Sync Service

↓

Videos Table

↓

Frontend
```

---

## Frecuencia

```yaml
12 horas
```

---

## Sincronización

Actualizar:

```yaml
Título

Descripción

Thumbnail

Duración

Fecha
```

---

## Reglas

No duplicar registros.

Utilizar:

```yaml
external_id
```

como llave natural.

---

# 13. SEO & GEO ARCHITECTURE

## SEO Layer

Incluye:

```yaml
Meta Tags

OpenGraph

Twitter

Schema

Canonical
```

---

## GEO Layer

Incluye:

```yaml
Answer Engine Optimization

AI Discoverability

Citation Readiness
```

---

## Structured Data

Generar:

```yaml
Organization

WebSite

Service

Article

VideoObject

FAQPage

BreadcrumbList

Person
```

---

## Sitemap

```text
sitemap.xml

pages.xml

solutions.xml

articles.xml

videos.xml
```

---

## Robots

Gestionar:

```yaml
GPTBot

OAI-SearchBot

ClaudeBot

Claude Search

PerplexityBot

Google Extended
```

---

# 14. SECURITY ARCHITECTURE

## Authentication

```yaml
Laravel Session Auth
```

---

## Hashing

```yaml
Argon2id
```

---

## Session Security

```yaml
Secure
HttpOnly
SameSite
```

---

## Authorization

```yaml
Roles

Permissions

Policies
```

---

## Protection

```yaml
CSRF

XSS

Rate Limiting

CSP

HTTPS
```

---

## Sensitive Files

Bloquear:

```text
.env

vendor

config

database

storage/private
```

---

# 15. PERFORMANCE ARCHITECTURE

## Estrategia

```yaml
Cached Routes

Cached Config

Cached Views
```

---

## Assets

```yaml
WebP

AVIF

Minified CSS

Minified JS
```

---

## Fonts

```yaml
WOFF2
font-display swap
```

---

## Video

No cargar iframe inicialmente.

Implementar:

```yaml
Lite YouTube Embed
```

---

# 16. INTEGRATION ARCHITECTURE

## Integraciones V1

```yaml
SMTP

Google Tag Manager

GA4

YouTube API
```

---

## Patrón

```text
Integration Service

↓

Connector

↓

Adapter

↓

External API
```

---

## Reglas

Nunca conectar directamente desde Controller.

---

# 17. DEPLOYMENT ARCHITECTURE

## Directorios

```text
/home/account

├── ng_mexico_app
├── backups
└── public_html
```

---

## Público

```text
public_html
```

---

## Privado

```text
app
config
vendor
database
storage
.env
```

---

# 18. OBSERVABILITY ARCHITECTURE

## Logs

```yaml
Application

Security

Integrations

SEO

Leads
```

---

## Ubicación

```text
storage/logs
```

---

## Nivel

```yaml
Info

Warning

Error

Critical
```

---

# 19. DISASTER RECOVERY

## Backups

Diarios:

```yaml
Database
```

---

Semanales:

```yaml
Uploads
```

---

Mensuales:

```yaml
Full Snapshot
```

---

## Restore

Objetivo:

```yaml
Recovery Procedure Documented
```

---

# 20. SCALABILITY MODEL

Versión 1:

```yaml
Single Site
Single Tenant
Single Country
```

---

Preparado para:

```yaml
Multi Country

Multi Language

Directory Platform

Marketplace

LMS
```

---

No implementado en V1.

---

# 21. NON FUNCTIONAL REQUIREMENTS

## Disponibilidad

Objetivo:

```yaml
99%
```

---

## Seguridad

```yaml
OWASP Top 10 Ready
```

---

## Accesibilidad

```yaml
WCAG 2.2 AA
```

---

## Compatibilidad

```yaml
Chrome

Edge

Firefox

Safari
```

---

## Responsive

```yaml
Mobile

Tablet

Desktop
```

---

# 22. CRITERIOS DE ACEPTACIÓN

La arquitectura será aceptada cuando:

✅ Compatible con PROJECT_MANIFEST v2

✅ Compatible con Laravel 12

✅ Compatible con PHP 8.2+

✅ Compatible con MySQL 8

✅ Compatible con cPanel

✅ Single Site

✅ CMS basado en componentes

✅ 15 verticales implementables

✅ Marca personal integrada

✅ YouTube integrado

✅ Lead Management operativo

✅ SEO técnico completo

✅ GEO Ready

✅ LLM Ready

✅ Seguridad empresarial

✅ Escalable sin rediseño

✅ Preparada para crecimiento futuro

---

# FIN DEL DOCUMENTO

Archivo:

```text
SYSTEM_ARCHITECTURE_V2.md
Version 2.0
Status: Approved Architecture Baseline
```