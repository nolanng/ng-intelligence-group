# DATABASE_SPECIFICATION_V2.md

# NG TECHNOLOGY MÉXICO
## Especificación Oficial de Base de Datos
### Versión 2.0
### Compatible con PROJECT_MANIFEST v2.0
### Compatible con SYSTEM_ARCHITECTURE v2.0

---

# 1. PROPÓSITO

Este documento define la estructura de datos oficial del ecosistema digital de NG TECHNOLOGY México.

Es la fuente de verdad para:

- Laravel Migrations
- Eloquent Models
- Repositories
- Services
- APIs
- Queries
- Reporting
- Auditoría
- SEO
- Gestión de Leads

Toda la persistencia debe respetar este documento.

---

# 2. PRINCIPIOS DE DISEÑO

## 2.1 Single Source Of Truth

No se permite duplicar información innecesariamente.

Cada entidad posee un único origen de datos.

---

## 2.2 Normalización

Objetivo:

```yaml
3NF
```

excepto:

```yaml
JSON controlado
```

cuando la estructura requiera flexibilidad.

---

## 2.3 Auditabilidad

Toda operación crítica debe poder rastrearse.

---

## 2.4 Escalabilidad

La base de datos debe permitir:

```yaml
Multi país futuro
Multi idioma futuro
Marketplace futuro
LMS futuro
```

sin rediseñar el núcleo.

---

## 2.5 Integridad Referencial

Todas las relaciones deben utilizar:

```yaml
Foreign Keys
```

siempre que sea posible.

---

# 3. CONFIGURACIÓN GENERAL

## Motor

```sql
InnoDB
```

---

## Charset

```sql
utf8mb4
```

---

## Collation

```sql
utf8mb4_unicode_ci
```

---

## Timezone

Persistencia:

```yaml
UTC
```

Presentación:

```yaml
America/Mexico_City
```

---

## Soft Deletes

Aplicar en:

```yaml
users
contents
media
```

---

# 4. DOMINIOS DE DATOS

```text
Identity

Content

SEO

Media

Leads

Video

Configuration

Audit

Infrastructure
```

---

# 5. IDENTITY DOMAIN

## users

Usuarios administrativos.

### Campos

```yaml
id
name
email
password
status
locale
timezone
email_verified_at
last_login_at
last_login_ip
remember_token
created_at
updated_at
deleted_at
```

### Índices

```yaml
email
status
```

---

## roles

### Valores Iniciales

```yaml
SuperAdmin
Administrador
Editor
Marketing
Comercial
Auditor
```

### Campos

```yaml
id
name
slug
description
created_at
updated_at
```

---

## permissions

Permisos granulares.

Ejemplos:

```yaml
pages.view
pages.create
pages.edit
pages.publish

seo.manage

users.manage
```

---

## role_user

Relación:

```text
Users ⇄ Roles
```

---

## permission_role

Relación:

```text
Permissions ⇄ Roles
```

---

# 6. CONTENT DOMAIN

## contents

Entidad central del CMS.

---

### Tipos Permitidos

```yaml
page

solution

article

resource

case_study

video

faq

landing
```

---

### Estados

```yaml
draft

review

approved

scheduled

published

archived
```

---

### Campos

```yaml
id
author_id
parent_id
featured_media_id

content_type

title
slug
excerpt
body

status
template

locale

sort_order

is_featured

published_at

created_at
updated_at
deleted_at
```

---

### Índices

```yaml
slug
content_type
status
published_at
```

---

# 7. CONTENT SECTION DOMAIN

## content_sections

Constructor por componentes.

---

### Tipos Permitidos

```yaml
hero

rich_text

benefits

features

stats

process

industry

video

faq

cta

resource

related_content

form
```

---

### Campos

```yaml
id

content_id

section_type

internal_name

heading

subheading

content

configuration

sort_order

is_active

created_at
updated_at
```

---

### Configuration JSON

Ejemplo:

```json
{
  "background": "dark",
  "columns": 3,
  "icon": "rocket"
}
```

---

# 8. TAXONOMY DOMAIN

## taxonomies

Permite clasificación dinámica.

---

### Tipo

```yaml
category

tag

industry

solution_category

audience
```

---

### solution_category

Permitidos:

```yaml
software

cloud

artificial_intelligence

iot

ecommerce

consulting

training
```

---

### Campos

```yaml
id
taxonomy_type
parent_id
name
slug
description
```

---

## content_taxonomy

Relación muchos a muchos.

```text
Contents ⇄ Taxonomies
```

---

# 9. SEO DOMAIN

## seo_metadata

Entidad SEO por contenido.

---

### Campos

```yaml
content_id

meta_title
meta_description

canonical_url

robots_directive

focus_keyword

secondary_keywords

og_title
og_description

og_image_id

twitter_card

hreflang_group

structured_data

include_in_sitemap

sitemap_priority

sitemap_changefreq
```

---

### Robots Permitidos

```yaml
index,follow

index,nofollow

noindex,follow

noindex,nofollow
```

---

### Twitter Card

```yaml
summary

summary_large_image
```

---

# 10. MEDIA DOMAIN

## media

Repositorio multimedia.

---

### Formatos Permitidos

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

### Campos

```yaml
id

uploaded_by

disk
directory

original_name
file_name

mime_type

extension

size_bytes

width
height

alt_text
title
caption

metadata

created_at
updated_at
deleted_at
```

---

### Reglas

Obligatorio:

```yaml
Alt Text
```

para imágenes publicadas.

---

# 11. BANNER DOMAIN

## banners

Banners administrables.

---

### Ubicaciones

```yaml
homepage

solution

blog

resources

footer
```

---

### Campos

```yaml
id

name

placement

title
subtitle

image_id
mobile_image_id

cta_label
cta_url

starts_at
ends_at

sort_order

is_active
```

---

# 12. FAQ DOMAIN

## faqs

Repositorio FAQ.

---

### Campos

```yaml
id

content_id

question

answer

locale

sort_order

is_active
```

---

### Uso

Generar:

```yaml
FAQPage JSON-LD
```

automáticamente.

---

# 13. FORMS DOMAIN

## forms

Configuración de formularios.

---

### Tipos

```yaml
contact

demo

consultation

diagnosis

quote

download

newsletter
```

---

### Campos

```yaml
id

name
slug

form_type

configuration

success_message

notification_email

is_active
```

---

# 14. LEADS DOMAIN

## form_submissions

Pipeline comercial.

---

### Campos

```yaml
id

form_id

content_id

vertical_code

name

company

email

phone

state

industry

employees

need

message

payload

source

medium

campaign

term

content

landing_url

consent_at

status

assigned_to

ip_hash

created_at
updated_at
```

---

### Estados Oficiales

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

### Índices

```yaml
status

created_at

vertical_code

assigned_to
```

---

# 15. VIDEO DOMAIN

## videos

Repositorio multimedia.

---

### Campos

```yaml
id

content_id

platform

external_id

title

description

thumbnail_url

duration_seconds

published_at

metadata

is_active
```

---

### Plataforma

V1:

```yaml
youtube
```

---

### Llave Natural

```yaml
platform
external_id
```

---

### Política de Sincronización

Cada:

```yaml
12 horas
```

---

# 16. REDIRECT DOMAIN

## redirects

SEO técnico.

---

### Campos

```yaml
id

source_path

target_url

http_status

hits

is_active
```

---

### Status Permitidos

```yaml
301
302
410
```

---

# 17. CONFIGURATION DOMAIN

## settings

Configuración global.

---

### Grupos

```yaml
company

seo

integrations

analytics

social

legal

system
```

---

### Campos

```yaml
id

setting_group

setting_key

setting_value

value_type

is_public
```

---

# 18. CREDENTIAL DOMAIN

## api_credentials

Credenciales cifradas.

---

### Servicios V1

```yaml
youtube

gtm

ga4

meta
```

---

### Campos

```yaml
id

service_name

credential_name

encrypted_value

environment

last_four

is_active

rotated_at
```

---

### Reglas

Nunca almacenar:

```yaml
API Key
Secret
Token
```

en texto plano.

---

# 19. AUDIT DOMAIN

## audit_logs

Trazabilidad.

---

### Campos

```yaml
id

user_id

event

auditable_type

auditable_id

route

method

ip_address

user_agent

old_values

new_values

created_at
```

---

### Eventos

```yaml
LOGIN

LOGOUT

CREATE

UPDATE

DELETE

PUBLISH

UNPUBLISH

ROLE_CHANGE

SETTINGS_CHANGE

API_KEY_CHANGE

EXPORT
```

---

# 20. SYSTEM DOMAIN

## jobs

Laravel Queue.

---

## failed_jobs

Errores de cola.

---

### Uso

```yaml
Email

YouTube Sync

SEO Jobs

Background Tasks
```

---

# 21. ENTIDADES DEL NEGOCIO

## Verticales Oficiales

Se almacenan como:

```yaml
content_type = solution
```

---

### Catálogo

```text
ERP SICLA®

Recursos Humanos

Kommo CRM

Digital Card

NEXT-GATE

Facturación Electrónica

Microsoft / Google

Telemetría GPS

My Marchamo

Marshal IA

My Negocio .Shop

Servicios de Agencia

Innovate 360°

Desarrollo de Software

Formación IA
```

---

### Marca Personal

Se almacena como:

```yaml
content_type = page
```

Slug:

```yaml
nolan-munoz-duran
```

---

# 22. ÍNDICES OBLIGATORIOS

## users

```sql
email
status
```

---

## contents

```sql
slug

content_type

status

published_at
```

---

## seo_metadata

```sql
content_id

focus_keyword
```

---

## videos

```sql
platform

external_id
```

---

## leads

```sql
status

created_at

vertical_code
```

---

## audit_logs

```sql
created_at

user_id

event
```

---

# 23. POLÍTICAS DE RETENCIÓN

## Leads

```yaml
5 años
```

---

## Auditoría

```yaml
3 años
```

---

## Logs

```yaml
90 días
```

---

# 24. ROADMAP FUTURO (NO IMPLEMENTAR)

No crear tablas todavía para:

```yaml
Marketplace

Directory

LMS

Customer Portal

Subscriptions

Payments
```

Sólo considerar extensibilidad.

---

# 25. MIGRACIONES REQUERIDAS

```text
create_users_table

create_roles_table

create_permissions_table

create_role_user_table

create_permission_role_table

create_media_table

create_contents_table

create_content_sections_table

create_taxonomies_table

create_content_taxonomy_table

create_seo_metadata_table

create_banners_table

create_faqs_table

create_forms_table

create_form_submissions_table

create_videos_table

create_redirects_table

create_settings_table

create_api_credentials_table

create_audit_logs_table

create_jobs_table

create_failed_jobs_table
```

---

# 26. CRITERIOS DE ACEPTACIÓN

✅ Compatible con MySQL 8

✅ Compatible con Laravel 12

✅ Compatible con PROJECT_MANIFEST v2

✅ Compatible con SYSTEM_ARCHITECTURE v2

✅ Soporte para CMS

✅ Soporte para SEO

✅ Soporte para GEO

✅ Soporte para IA Search

✅ Soporte para Leads

✅ Soporte para YouTube

✅ Soporte para Auditoría

✅ Compatible con las 15 verticales

✅ Preparada para futuras expansiones

---

# FIN DEL DOCUMENTO

Archivo:

```text
DATABASE_SPECIFICATION_V2.md
Version 2.0
Status: Approved Data Model
```