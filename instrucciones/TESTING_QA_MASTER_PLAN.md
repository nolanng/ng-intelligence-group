# TESTING_QA_MASTER_PLAN.md

# NG TECHNOLOGY MÉXICO
## Plan Maestro de Pruebas y Aseguramiento de Calidad
### Versión 2.0
### Compatible con todos los documentos maestros

**Documento padre:** PROJECT_MANIFEST.md v2.0

---

# 1. PROPÓSITO

Este documento define la estrategia oficial de:

- Quality Assurance (QA)
- Testing Funcional
- Testing Técnico
- Testing de Seguridad
- Testing SEO
- Testing GEO
- Testing de Accesibilidad
- Testing de Rendimiento
- Validación Pre-Producción
- Validación Post-Producción

para el ecosistema NG TECHNOLOGY México.

Su objetivo es garantizar que el producto llegue a producción con calidad empresarial.

---

# 2. ALCANCE

Aplica a:

```text
Portal Público

CMS

Panel Administrativo

SEO

GEO

API

YouTube

Leads

Usuarios

Seguridad

Analítica

Integraciones
```

---

# 3. OBJETIVOS

## Objetivos Primarios

```yaml
Reducir defectos

Garantizar estabilidad

Garantizar seguridad

Garantizar accesibilidad

Garantizar SEO

Garantizar conversión
```

---

## Objetivos Secundarios

```yaml
Reducir regresiones

Facilitar despliegues

Mejorar mantenibilidad
```

---

# 4. DEFINICIÓN DE CALIDAD

Un módulo se considera de calidad cuando:

✅ Cumple requerimientos

✅ No tiene errores críticos

✅ Tiene pruebas

✅ Tiene permisos

✅ Tiene validación

✅ Tiene documentación

✅ Cumple seguridad

✅ Cumple SEO

✅ Cumple accesibilidad

---

# 5. ESTRATEGIA QA

Pirámide:

```text
Unit Tests

↓

Feature Tests

↓

Integration Tests

↓

Manual QA

↓

User Acceptance Testing
```

---

# 6. CLASIFICACIÓN DE DEFECTOS

## Critical

Impide operar.

Ejemplos:

```text
No login

No leads

No publicación

Pérdida de datos
```

---

## High

Funcionalidad clave dañada.

---

## Medium

Existe alternativa.

---

## Low

Problema cosmético.

---

# 7. ÁREAS DE PRUEBA

---

## FOUNDATION

```text
Autenticación

Permisos

Usuarios

Configuración
```

---

## CMS

```text
Pages

Solutions

Blog

Resources

Videos
```

---

## LEADS

```text
Forms

Pipeline

Assignment
```

---

## SEO

```text
Metadata

Canonical

Schema

Sitemap

Robots
```

---

## GEO

```text
Citations

Structured Content

AI Readiness
```

---

## API

```text
Public API

Admin API
```

---

## MEDIA

```text
Uploads

Optimization
```

---

# 8. UNIT TESTS

Objetivo:

Validar lógica de negocio.

---

Cobertura mínima:

```text
Lead Services

SEO Services

YouTube Services

Content Services

Permissions
```

---

Ejemplo:

```php
LeadCaptureServiceTest
```

---

# 9. FEATURE TESTS

Objetivo:

Validar comportamiento completo.

---

Cobertura mínima:

```text
Login

Logout

Create Content

Publish Content

Create Lead

Search

Sitemap
```

---

# 10. AUTH TESTS

Casos:

---

## QA-AUTH-001

Login válido

Resultado esperado:

```yaml
200
Dashboard visible
```

---

## QA-AUTH-002

Credenciales inválidas

Resultado:

```yaml
Error controlado
```

---

## QA-AUTH-003

Logout

Resultado:

```yaml
Sesión destruida
```

---

# 11. PERMISSIONS TESTS

---

## QA-PERM-001

Editor no puede gestionar usuarios.

---

## QA-PERM-002

Administrador puede publicar.

---

## QA-PERM-003

Comercial puede ver Leads.

---

## QA-PERM-004

Auditor no modifica contenidos.

---

# 12. CMS TESTS

---

## QA-CMS-001

Crear página.

---

## QA-CMS-002

Editar página.

---

## QA-CMS-003

Eliminar página.

---

## QA-CMS-004

Publicar página.

---

## QA-CMS-005

Programar publicación.

---

## QA-CMS-006

Archivar contenido.

---

# 13. COMPONENT BUILDER TESTS

Validar:

```text
Hero

Benefits

Features

FAQ

CTA

Video

Form
```

---

Casos:

```text
Agregar componente

Editar componente

Eliminar componente

Reordenar componente
```

---

# 14. SOLUTION TESTS

Validar las 15 verticales.

---

## QA-SOL-001

ERP SICLA®

---

## QA-SOL-002

Recursos Humanos

---

## QA-SOL-003

Kommo CRM

---

## QA-SOL-004

Digital Card

---

## QA-SOL-005

NEXT-GATE

---

## QA-SOL-006

Facturación Electrónica

---

## QA-SOL-007

Microsoft / Google

---

## QA-SOL-008

Telemetría GPS

---

## QA-SOL-009

My Marchamo

---

## QA-SOL-010

Marshal IA

---

## QA-SOL-011

My Negocio .Shop

---

## QA-SOL-012

Servicios de Agencia

---

## QA-SOL-013

Innovate 360°

---

## QA-SOL-014

Desarrollo de Software

---

## QA-SOL-015

Formación IA

---

Validaciones:

```text
Carga

SEO

CTA

Formulario

Schema
```

---

# 15. LEADS TESTS

---

## QA-LEAD-001

Crear lead exitoso.

---

## QA-LEAD-002

Validación email.

---

## QA-LEAD-003

Rate limiting.

---

## QA-LEAD-004

Guardar origen.

---

## QA-LEAD-005

Guardar UTM.

---

## QA-LEAD-006

Cambio de estado.

---

## QA-LEAD-007

Asignación.

---

# 16. YOUTUBE TESTS

---

## QA-YT-001

Sincronización correcta.

---

## QA-YT-002

No duplicados.

---

## QA-YT-003

Falla API.

Resultado:

```yaml
Videos continúan visibles
```

---

## QA-YT-004

Actualización metadata.

---

# 17. SEARCH TESTS

---

## QA-SRCH-001

Buscar palabra existente.

---

## QA-SRCH-002

Sin coincidencias.

---

## QA-SRCH-003

Caracteres especiales.

---

# 18. SEO TESTS

---

## QA-SEO-001

Title presente.

---

## QA-SEO-002

Description presente.

---

## QA-SEO-003

Canonical correcto.

---

## QA-SEO-004

OpenGraph presente.

---

## QA-SEO-005

Twitter Card presente.

---

# 19. SCHEMA TESTS

---

## QA-SCHEMA-001

Organization

---

## QA-SCHEMA-002

Service

---

## QA-SCHEMA-003

FAQPage

---

## QA-SCHEMA-004

VideoObject

---

## QA-SCHEMA-005

BreadcrumbList

---

## QA-SCHEMA-006

Person

---

# 20. SITEMAP TESTS

---

## QA-SMAP-001

XML válido.

---

## QA-SMAP-002

URLs canónicas.

---

## QA-SMAP-003

No incluir borradores.

---

## QA-SMAP-004

No incluir noindex.

---

# 21. ROBOTS TESTS

---

## QA-ROB-001

robots disponible.

---

## QA-ROB-002

Reglas GPTBot.

---

## QA-ROB-003

Reglas ClaudeBot.

---

## QA-ROB-004

Reglas Google-Extended.

---

# 22. GEO TESTS

Validar:

```text
Contenido estructurado

FAQs

Definiciones

Conclusiones

Autor
```

---

# 23. API TESTS

---

## QA-API-001

GET solutions

---

## QA-API-002

GET articles

---

## QA-API-003

POST lead

---

## QA-API-004

Rate limiting

---

## QA-API-005

401 sin token

---

## QA-API-006

403 permisos

---

# 24. MEDIA TESTS

---

## QA-MEDIA-001

Upload JPG

---

## QA-MEDIA-002

Upload WEBP

---

## QA-MEDIA-003

Upload PDF

---

## QA-MEDIA-004

Archivo no permitido

---

# 25. SEGURIDAD

---

## QA-SEC-001

CSRF

---

## QA-SEC-002

XSS

---

## QA-SEC-003

SQL Injection

---

## QA-SEC-004

Rate Limit

---

## QA-SEC-005

Permisos

---

## QA-SEC-006

Archivos sensibles

Verificar:

```text
.env

vendor

storage

config
```

inaccesibles.

---

# 26. ACCESIBILIDAD

Objetivo:

```yaml
WCAG 2.2 AA
```

---

Validar:

```text
Teclado

Focus

ARIA

Contraste

Zoom 200%
```

---

# 27. RESPONSIVE TESTS

Viewports:

```text
320

360

768

1024

1280

1440
```

---

# 28. PERFORMANCE TESTS

Objetivos:

```yaml
Lighthouse > 90

LCP < 2.5s

CLS < 0.1

INP < 200ms
```

---

Pruebas:

```text
Home

Landing

Blog

Videos
```

---

# 29. UAT

User Acceptance Testing.

Usuarios:

```text
Director

Marketing

Comercial

Editor
```

---

Checklist:

✅ Navegación

✅ Leads

✅ Publicación

✅ SEO

✅ Videos

---

# 30. CRITERIOS GO-LIVE

No se permite producción si existe:

```text
Critical Defects
```

abiertos.

---

Permitidos:

```text
Low

Minor UI
```

aprobados.

---

# 31. MATRIZ DE APROBACIÓN

| Tipo | Responsable |
|--------|--------|
| Funcional | Product Owner |
| UX | Diseño |
| SEO | SEO Lead |
| Seguridad | Arquitectura |
| Performance | Tech Lead |
| Producción | Dirección Proyecto |

---

# 32. DEFINITION OF DONE QA

Una historia está aprobada cuando:

✅ Tests ejecutados

✅ Sin defectos críticos

✅ Sin defectos altos

✅ Evidencia generada

✅ Validación funcional

✅ Validación SEO

✅ Validación accesibilidad

---

# 33. CRITERIOS DE ACEPTACIÓN

✅ Compatible con Laravel 12

✅ Compatible con cPanel

✅ Compatible con SEO

✅ Compatible con GEO

✅ Compatible con WCAG

✅ Compatible con todos los documentos maestros

✅ Preparado para producción

---

# 34. APROBACIÓN

```yaml
document: TESTING_QA_MASTER_PLAN.md
version: 2.0
status: final
parent_document: PROJECT_MANIFEST.md
requires_change_control: true
```

---

# FIN DEL DOCUMENTO

```text
TESTING_QA_MASTER_PLAN.md
Version 2.0
Status: Approved QA Master Plan
```