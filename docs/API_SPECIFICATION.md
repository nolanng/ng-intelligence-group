# API_SPECIFICATION.md

# NG TECHNOLOGY MÉXICO
## Especificación Oficial de APIs
### Versión 2.0
### Compatible con PROJECT_MANIFEST v2.0
### Compatible con SYSTEM_ARCHITECTURE v2.0
### Compatible con DATABASE_SPECIFICATION v2.0
### Compatible con UI_UX_SPECIFICATION v2.0
### Compatible con SEO_GEO_SPECIFICATION v2.0
### Compatible con DEVELOPMENT_STANDARDS v2.0

---

# 1. PROPÓSITO

Este documento define los estándares, contratos y lineamientos de todas las APIs del ecosistema NG TECHNOLOGY México.

Objetivos:

- Estandarizar integraciones.
- Permitir interoperabilidad.
- Facilitar futuras integraciones CRM.
- Facilitar automatizaciones.
- Mantener seguridad.
- Evitar dependencias directas entre módulos.

---

# 2. PRINCIPIOS

## API First

Toda funcionalidad importante debe poder exponerse mediante API.

---

## Secure By Default

Toda API debe ser segura desde su diseño.

---

## Consistency

Los endpoints deben seguir patrones uniformes.

---

## Versioning

Toda API pública debe versionarse.

Ejemplo:

```text
/api/v1/
```

---

# 3. ARQUITECTURA

```text
Client

↓

API Gateway Layer

↓

Controller

↓

Request Validation

↓

Service Layer

↓

Repository

↓

Database
```

---

# 4. FORMATO DE RESPUESTA

## Success

```json
{
  "success": true,
  "message": "Lead creado correctamente",
  "data": {}
}
```

---

## Error

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": [
      "El correo es obligatorio."
    ]
  }
}
```

---

# 5. VERSIONAMIENTO

## Formato

```text
/api/v1/
```

---

## Futuras versiones

```text
/api/v2/
/api/v3/
```

---

# 6. AUTENTICACIÓN

## Panel Administrativo

```yaml
Laravel Session Auth
```

---

## API Externa

```yaml
Bearer Token
```

---

## Tokens

Almacenamiento:

```yaml
Hash
Encrypted
```

---

# 7. RATE LIMITING

## Público

```yaml
60 requests/minute
```

---

## Formularios

```yaml
10 requests/minute
```

---

## Administrativo

```yaml
120 requests/minute
```

---

# 8. ENDPOINTS PÚBLICOS

## Soluciones

```http
GET /api/v1/solutions
```

---

Respuesta:

```json
{
  "success": true,
  "data": []
}
```

---

## Solución individual

```http
GET /api/v1/solutions/{slug}
```

---

## Recursos

```http
GET /api/v1/resources
```

---

## Artículos

```http
GET /api/v1/articles
```

---

## Videos

```http
GET /api/v1/videos
```

---

## FAQs

```http
GET /api/v1/faqs
```

---

# 9. LEADS API

## Crear Lead

```http
POST /api/v1/leads
```

---

### Request

```json
{
  "name": "Juan Perez",
  "company": "Empresa",
  "email": "correo@empresa.com",
  "phone": "+52 123456789",
  "solution": "erp-sicla",
  "message": "Necesito información"
}
```

---

### Response

```json
{
  "success": true,
  "message": "Lead registrado"
}
```

---

## Validaciones

```yaml
name required
email required
phone optional
message optional
```

---

# 10. FORMULARIOS

## Obtener formularios

```http
GET /api/v1/forms
```

---

## Formulario específico

```http
GET /api/v1/forms/{slug}
```

---

# 11. VIDEOS API

## Listado

```http
GET /api/v1/videos
```

---

## Video

```http
GET /api/v1/videos/{id}
```

---

## Filtros

```http
?topic=ia

?solution=marshal-ia
```

---

# 12. CONTENT API

## Obtener página

```http
GET /api/v1/content/{slug}
```

---

## Resultado

```json
{
  "title": "",
  "sections": []
}
```

---

# 13. SEO API

## Metadata

```http
GET /api/v1/seo/{slug}
```

---

## Resultado

```json
{
  "title": "",
  "description": "",
  "canonical": ""
}
```

---

# 14. SEARCH API

## Búsqueda global

```http
GET /api/v1/search?q=crm
```

---

## Cobertura

```yaml
Solutions
Articles
Videos
Resources
FAQs
```

---

# 15. ADMIN API

## Usuarios

```http
GET /api/admin/v1/users
```

---

Permiso:

```yaml
users.view
```

---

## Crear Usuario

```http
POST /api/admin/v1/users
```

---

## Roles

```http
GET /api/admin/v1/roles
```

---

# 16. CONTENT MANAGEMENT API

## Crear contenido

```http
POST /api/admin/v1/contents
```

---

## Actualizar

```http
PUT /api/admin/v1/contents/{id}
```

---

## Publicar

```http
POST /api/admin/v1/contents/{id}/publish
```

---

## Archivar

```http
POST /api/admin/v1/contents/{id}/archive
```

---

# 17. MEDIA API

## Upload

```http
POST /api/admin/v1/media
```

---

## Delete

```http
DELETE /api/admin/v1/media/{id}
```

---

## Restricciones

```yaml
jpg
jpeg
png
webp
avif
svg
pdf
```

---

# 18. LEADS ADMIN API

## Listado

```http
GET /api/admin/v1/leads
```

---

## Detalle

```http
GET /api/admin/v1/leads/{id}
```

---

## Asignar

```http
POST /api/admin/v1/leads/{id}/assign
```

---

## Cambiar estado

```http
POST /api/admin/v1/leads/{id}/status
```

---

Estados:

```yaml
new
assigned
contacted
qualified
proposal
won
lost
discarded
```

---

# 19. YOUTUBE SYNC API

## Sincronizar

```http
POST /api/admin/v1/youtube/sync
```

---

Permiso:

```yaml
youtube.sync
```

---

Resultado:

```json
{
  "processed": 120,
  "created": 5,
  "updated": 115
}
```

---

# 20. SETTINGS API

## Configuración

```http
GET /api/admin/v1/settings
```

---

## Actualizar

```http
PUT /api/admin/v1/settings
```

---

# 21. AUDIT API

## Logs

```http
GET /api/admin/v1/audit
```

---

Filtros:

```yaml
user
event
date
```

---

# 22. WEBHOOKS

## Endpoint Base

```http
POST /api/v1/webhooks/{provider}
```

---

## Seguridad

```yaml
Signature Validation
Replay Protection
Rate Limit
```

---

# 23. RESPONSE HEADERS

Obligatorios:

```http
Content-Type: application/json

X-Request-Id

X-API-Version
```

---

# 24. ERROR CODES

## 400

```yaml
Bad Request
```

---

## 401

```yaml
Unauthorized
```

---

## 403

```yaml
Forbidden
```

---

## 404

```yaml
Not Found
```

---

## 422

```yaml
Validation Error
```

---

## 429

```yaml
Too Many Requests
```

---

## 500

```yaml
Internal Error
```

---

# 25. OPENAPI

La especificación OpenAPI debe generarse para:

```yaml
API Pública
API Administrativa
Webhooks
```

---

Formato:

```yaml
OpenAPI 3.1
```

---

# 26. SEGURIDAD

## Obligatorio

```yaml
HTTPS

TLS

CSRF cuando aplique

Rate Limiting

Policy Authorization

Validation
```

---

## Prohibido

```yaml
Secrets in Responses

Stack Traces

Debug Data
```

---

# 27. OBSERVABILIDAD

Registrar:

```yaml
Request Id

Response Time

Endpoint

Status Code
```

---

No registrar:

```yaml
Passwords

Tokens

PII sensible
```

---

# 28. FUTURAS INTEGRACIONES

Preparado para:

```yaml
CRM

Power Automate

Microsoft 365

Copilot Studio

ERP

Marketplace

LMS
```

---

No implementar en V1.

---

# 29. CRITERIOS DE ACEPTACIÓN

✅ Versionado v1

✅ JSON consistente

✅ Rate Limiting

✅ Seguridad OAuth/Bearer

✅ CRUD administrativo

✅ Leads API

✅ Videos API

✅ SEO API

✅ Search API

✅ Audit API

✅ OpenAPI 3.1

✅ Compatible con Laravel 12

✅ Compatible con cPanel

✅ Compatible con arquitectura aprobada

---

# 30. APROBACIÓN

```yaml
document: API_SPECIFICATION.md
version: 2.0
status: final
parent_document: PROJECT_MANIFEST.md
requires_change_control: true
```

---

# FIN DEL DOCUMENTO

```text
API_SPECIFICATION.md
Version 2.0
Status: Approved API Baseline
```