# ADDENDUM_CAMBIO_MARCA.md
## NG INTELLIGENCE GROUP
### Control de Cambios sobre Documentos Maestros v2.0
### Documento hijo de: PROJECT_MANIFEST.md

---

# 1. PROPÓSITO

Este addendum formaliza el cambio de identidad de marca detectado antes del inicio
de desarrollo, y define cómo se modela correctamente para que el sistema de
SEO/GEO sea **nativo** desde el primer sprint — no un parche posterior.

---

# 1.1 REGISTRO FORMAL DE CONTROL DE CAMBIOS (formato exigido por PROJECT_MANIFEST.md sección 32)

## Cambio 001 — Identidad de marca

```yaml
id_del_cambio: CC-001
fecha: 2026-09-11
solicitante: Cliente (dirección de proyecto)
motivo: Corrección de identidad de marca antes de iniciar desarrollo
descripcion: >
  Se reemplaza "NG TECHNOLOGY México" como nombre de marca visible por
  "NG Intelligence Group", declarando explícitamente "NG TECHNOLOGY S.A."
  como razón social. Se agrega historia corporativa (fundación 21-dic-2001,
  Costa Rica, expansión LATAM) y fecha de lanzamiento oficial en México
  (enero 2027). Se decide publicar el sitio en tiempo presente desde el día 1.
impacto_funcional: Ninguno (solo copy, metadatos y JSON-LD)
impacto_tecnico: Nuevas claves en `settings` (brand_name, legal_name, launch_date)
impacto_en_datos: Ninguno en schema; solo valores semilla en `settings`
impacto_en_seguridad: Ninguno
impacto_en_seo: Alto — redefine Organization JSON-LD, meta title, Entity SEO
impacto_en_plazo: Ninguno (resuelto antes del Sprint 1)
decision: Aprobado
aprobador: Cliente (dirección de proyecto)
version_afectada: SEO_GEO_SPECIFICATION.md, CONTENT_OPERATIONS_PLAYBOOK.md, PROJECT_MANIFEST.md (sección 31, ítems "Dominio definitivo" y "Razón social que se mostrará" quedan resueltos)
```

## Cambio 002 — Nombre de carpeta de despliegue

```yaml
id_del_cambio: CC-002
fecha: 2026-09-11
solicitante: Cliente (dirección de proyecto)
motivo: Preferencia operativa del equipo sobre nomenclatura de carpetas en cPanel
descripcion: >
  PROJECT_MANIFEST.md sección 15 define el directorio privado como
  "ng_mexico_app/". Se sustituye por "mexico/" en toda la infraestructura
  real. La estructura interna (app, bootstrap, config, symlink de storage,
  backups_private, public_html/build) no cambia, solo el nombre del
  directorio raíz privado.
impacto_funcional: Ninguno
impacto_tecnico: Rutas absolutas en cron, .env y symlink de storage deben usar "mexico"
impacto_en_datos: Ninguno
impacto_en_seguridad: Ninguno
impacto_en_seo: Ninguno
impacto_en_plazo: Ninguno
decision: Aprobado
aprobador: Cliente (dirección de proyecto)
version_afectada: PROJECT_MANIFEST.md sección 15 (Arquitectura de Despliegue)
```

---

# 2. CAMBIO APROBADO

| Campo | Antes | Ahora |
|---|---|---|
| Marca comercial (trading name) | NG TECHNOLOGY México | **NG Intelligence Group** |
| Razón social (legal entity) | (no declarada) | **NG TECHNOLOGY S.A.** |
| Relación entre ambas | — | NG Intelligence Group es marca comercial **operada por** NG TECHNOLOGY S.A. |
| Fecha de fundación (grupo) | (no declarada) | **21 de diciembre de 2001** |
| País de fundación | — | **Costa Rica** |
| Expansión | — | LATAM; llegada a México como NG Intelligence Group (2027) |
| Posicionamiento | — | +25 años de trayectoria en soluciones empresariales de misión crítica |
| Dominio | ngintelligencegroup.com | ngintelligencegroup.com (**confirmado como único y definitivo**, sin dominios alternos) |

---

# 3.1 SOBRE EL ORIGEN COSTARRICENSE Y LA REGLA DE SEO_GEO_SPECIFICATION.md SECCIÓN 6

`SEO_GEO_SPECIFICATION.md` sección 6 instruye "evitar regionalismos
costarricenses, terminología fiscal CR, referencias CRC". Esa regla **sigue
vigente sin cambios** y aplica a todo el contenido operativo dirigido al
usuario mexicano: precios (siempre MXN), formularios, terminología fiscal
(facturación electrónica CFDI, no "Hacienda CR"), y tono comercial.

Esto **no es incompatible** con declarar el origen corporativo. Son dos capas
distintas:

- **Capa operativa** (precios, formularios, terminología fiscal, CTAs):
  100% mexicana, sin regionalismos CR. Sin cambios.
- **Capa de historia/autoridad de marca** (página "Nosotros", JSON-LD
  `foundingLocation`, Citability Framework): SÍ debe declarar que NG
  TECHNOLOGY S.A. fue fundada en Costa Rica en 2001 y se expandió por
  LATAM — esto es un dato verificable que **aumenta** la confianza y
  citabilidad ante motores generativos, no la reduce. Ocultarlo sería
  contraproducente para GEO (reduce verificabilidad, ver sección 23 de
  SEO_GEO_SPECIFICATION.md: "Contenido debe ser verificable").

## Frase de origen — VERSIÓN FINAL APROBADA v2 (para la página "Nosotros")

Decisión de negocio confirmada: publicar todo el sitio en tiempo presente,
como si la operación en México ya estuviera activa, para poder usar el sitio
como insumo de campañas de publicidad y generación de marca antes del
lanzamiento formal de enero 2027.

```text
NG TECHNOLOGY S.A. fue fundada el 21 de diciembre de 2001 en Costa Rica. Con
más de 25 años de trayectoria en soluciones empresariales de misión crítica,
el grupo se ha expandido por Latinoamérica, llevando su innovación
tecnológica a México a través de la marca NG Intelligence Group.
```

Regla de redacción para TODO el sitio (versión final, reemplaza la anterior):
- **Trayectoria de 25 años / historia del grupo** → pasado o presente
  perfecto, sin cambios ("fue fundada", "se ha expandido").
- **Presencia en México** → **presente**, en todo el sitio: Home, Soluciones,
  Nosotros, formularios, JSON-LD. No se usa lenguaje de "Próximamente" ni
  fechas futuras condicionadas.
- El dato duro que **no cambia y sigue siendo intocable** es `foundingDate`
  (2001-12-21) y `foundingLocation` (Costa Rica) — eso es histórico y
  verificable, se mantiene igual que antes.
- La fecha de "lanzamiento oficial enero 2027" deja de aparecer como
  restricción de contenido público. Se conserva únicamente como dato interno
  de planeación (ver más abajo), por ejemplo para coordinar un eventual
  anuncio de "gran apertura" o campaña de PR, pero no bloquea ni condiciona
  ningún texto del sitio.

## Implicación operativa (actualizada)

El campo `launch_date` en `settings` se conserva, pero cambia de propósito:
ya no condiciona textos ni banners — queda como dato de referencia interna
para reportes/planeación de marketing, sin efecto visible en el frontend.

```yaml
setting_group: company
setting_key:   launch_date
setting_value: "2027-01-01"
is_public:     false
```

Consecuencia operativa importante para el equipo comercial: al publicar el
sitio ya en tiempo presente, los formularios de `form_submissions`
(Contacto/Demo/Diagnóstico IA/Cotización) generarán **Leads reales** desde el
día de publicación, no desde enero 2027. El pipeline comercial
(`new → assigned → contacted...`) debe estar operativo y con dueño asignado
desde el lanzamiento del sitio, no desde el lanzamiento oficial de marca.

---

# 3. POR QUÉ ESTO NO ES UN SIMPLE FIND & REPLACE

Un LLM o un motor de búsqueda generativo (GEO) que encuentre "NG Intelligence
Group" y "NG TECHNOLOGY S.A." en el mismo dominio sin una relación explícita
puede interpretarlos como dos entidades distintas, o desconfiar de cuál es la
"real". Esto reduce la probabilidad de citación (Citability Framework de
SEO_GEO_SPECIFICATION.md, sección 13). La solución nativa es declarar la
relación explícitamente en:

1. El **schema.org Organization** (campo `legalName` vs `name`/`brand`).
2. El **texto visible** de la página "Nosotros" (una oración explícita, no solo
   el logo).
3. La **política de autoría** del Content Operations Playbook.
4. Los **metadatos** (`meta_title`, `og_title`) — usan el nombre comercial.
5. El **footer legal** — usa la razón social (típico en México para avisos
   legales/facturación).

---

# 4. MODELO DE ENTIDAD OFICIAL (reemplaza sección 14 de SEO_GEO_SPECIFICATION.md
   y sección 17 de CONTENT_OPERATIONS_PLAYBOOK.md)

## 4.1 Entidad Principal (marca, visible al usuario)
```text
NG Intelligence Group
```

## 4.2 Entidad Legal (razón social, uso en avisos legales/factura/footer)
```text
NG TECHNOLOGY S.A.
```

## 4.3 Frase de definición obligatoria (GEO — debe existir literalmente en
   la página "Nosotros" y puede repetirse en el footer)
```text
NG Intelligence Group es la marca comercial de NG TECHNOLOGY S.A.,
con más de 25 años de trayectoria en soluciones empresariales de misión crítica.
```
Esta frase declarativa es la que un motor generativo (ChatGPT, Gemini, Claude,
Perplexity) más probablemente cite textualmente al responder "¿qué es NG
Intelligence Group?" — por eso debe ser una oración autocontenida, verificable
y sin ambigüedad.

## 4.4 Entidad Secundaria (sin cambio)
```text
Nolan Muñoz Durán
```

## 4.5 Entidades Comerciales (sin cambio)
```text
ERP SICLA®, Marshal IA, Kommo CRM, NEXT-GATE, My Marchamo, y las demás verticales
```

---

# 5. AJUSTES EN CADA DOCUMENTO MAESTRO

## SEO_GEO_SPECIFICATION.md
- Sección 2.2 "Entity First": `name` = NG Intelligence Group, `legalName` = NG TECHNOLOGY S.A.
- Sección 14 "Entity SEO": actualizar Entidad Principal.
- Sección 16 "Organization Schema": ver plantilla JSON-LD en sección 6 de este addendum.

## CONTENT_OPERATIONS_PLAYBOOK.md
- Sección 17 "Política de Autoría → Autor Corporativo": cambia de
  `NG TECHNOLOGY México` a `NG Intelligence Group`.
- Sección 21 "Meta Title": formato actualizado a `Tema | NG Intelligence Group`.

## PROJECT_MANIFEST.md / PROMPT_MASTER_FOR_GEMINI.md
- Toda referencia a "NG TECHNOLOGY México" como nombre de marca visible se
  reemplaza por "NG Intelligence Group". La razón social "NG TECHNOLOGY S.A."
  se usa únicamente en contexto legal/fiscal/footer.

## DATABASE_SPECIFICATION.md
- No requiere cambio de esquema. Se sugiere sembrar en `settings`
  (`setting_group = company`) dos claves: `brand_name` = "NG Intelligence
  Group" y `legal_name` = "NG TECHNOLOGY S.A." — así el dato vive en un solo
  lugar y no queda hardcodeado en Blade.

---

# 6. PLANTILLA JSON-LD OFICIAL (reemplaza la del PROMPT_PARA_ANTIGRAVITY.md)

```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "NG Intelligence Group",
  "legalName": "NG TECHNOLOGY S.A.",
  "brand": {
    "@type": "Brand",
    "name": "NG Intelligence Group"
  },
  "foundingDate": "2001-12-21",
  "foundingLocation": {
    "@type": "Place",
    "address": { "@type": "PostalAddress", "addressCountry": "CR" }
  },
  "url": "https://ngintelligencegroup.com",
  "logo": "https://ngintelligencegroup.com/assets/logo.png",
  "description": "NG Intelligence Group es la marca comercial de NG TECHNOLOGY S.A., empresa fundada en Costa Rica en 2001. Con más de 25 años de trayectoria en soluciones empresariales de misión crítica, el grupo se ha expandido por Latinoamérica, llevando su innovación tecnológica a México.",
  "sameAs": [],
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "customer service",
    "areaServed": "MX",
    "availableLanguage": "es-MX"
  }
}
```

Notas:
- `foundingDate` y `foundingLocation` ya son seguros de publicar (dato
  confirmado por el cliente: 21 de diciembre de 2001, Costa Rica).
- `contactPoint.areaServed` se mantiene en `MX` porque este sitio opera para
  el mercado mexicano — `foundingLocation` es histórico, no contradice el
  alcance operativo actual.
- `sameAs` y `contactPoint.telephone` siguen pendientes de datos reales.

---

# 7. APROBACIÓN

```yaml
document: ADDENDUM_CAMBIO_MARCA.md
version: 1.0
status: final
parent_document: PROJECT_MANIFEST.md
amends:
  - SEO_GEO_SPECIFICATION.md (secciones 2.2, 14, 16)
  - CONTENT_OPERATIONS_PLAYBOOK.md (secciones 17, 21)
  - PROMPT_MASTER_FOR_GEMINI.md
  - PROMPT_PARA_ANTIGRAVITY.md (generado por el Orquestador)
requires_change_control: true
```

---

# FIN DEL DOCUMENTO
