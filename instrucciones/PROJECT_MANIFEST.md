# PROJECT_MANIFEST.md

# NG TECHNOLOGY MÉXICO
## Ecosistema digital corporativo, comercial y educativo

**Versión:** 2.0 Final  
**Estado:** Fuente maestra de producto y desarrollo  
**Propietario:** NG TECHNOLOGY  
**Product Owner:** Nolan Muñoz Durán  
**Mercado inicial:** México  
**Idioma principal:** Español de México (`es-MX`)  
**Zona horaria operativa:** `America/Mexico_City`  
**Moneda de referencia:** MXN  
**Arquitectura de despliegue:** cPanel, Apache, PHP y MySQL/MariaDB  

---

# 1. PROPÓSITO DEL DOCUMENTO

Este documento es la fuente maestra de requisitos para el diseño y desarrollo del ecosistema digital de NG TECHNOLOGY México.

Debe ser utilizado por la inteligencia artificial de desarrollo, los arquitectos, desarrolladores, diseñadores, responsables de contenido, especialistas SEO, QA y administradores de infraestructura.

Este manifiesto define:

- Visión y objetivos del producto.
- Alcance funcional de la versión 1.
- Arquitectura tecnológica obligatoria.
- Verticales comerciales incluidas.
- Experiencia esperada para usuarios públicos y administrativos.
- Requisitos de seguridad, rendimiento, SEO, GEO e indexación para motores de IA.
- Reglas de implementación y despliegue en cPanel.
- Criterios de aceptación.
- Exclusiones y elementos del roadmap futuro.

Los documentos complementarios deben obedecer este manifiesto:

```text
PROJECT_MANIFEST.md
SYSTEM_ARCHITECTURE.md
DATABASE_SPECIFICATION.md
UI_UX_SPECIFICATION.md
```

En caso de contradicción, prevalece `PROJECT_MANIFEST.md`.

---

# 2. INSTRUCCIONES PARA LA IA DE DESARROLLO

La IA debe tratar este archivo como un contrato técnico y funcional.

## 2.1 Reglas obligatorias

1. No omitir requisitos marcados como obligatorios.
2. No sustituir el stack tecnológico sin autorización explícita.
3. No inventar nombres comerciales, precios, testimonios, clientes, certificaciones, direcciones, teléfonos ni credenciales.
4. No inventar regulaciones mexicanas ni afirmar cumplimiento fiscal o legal sin contenido aprobado.
5. No convertir el proyecto en una SPA basada en React, Vue o Angular.
6. No utilizar procesos Node.js persistentes.
7. No crear microservicios para la versión 1.
8. No crear un constructor visual libre tipo Elementor o Gutenberg.
9. No crear todavía un LMS, marketplace, portal de clientes ni directorio empresarial.
10. No eliminar ninguna vertical comercial.
11. Mantener la marca personal y YouTube como parte explícita del alcance.
12. Crear código funcional, no pseudocódigo.
13. Crear migraciones, seeders, validaciones, políticas, pruebas y documentación.
14. Mantener compatibilidad con PHP 8.2 o superior y cPanel estándar.
15. Conservar separación estricta entre archivos públicos y privados.
16. Aplicar seguridad, accesibilidad, SEO y rendimiento desde el inicio.
17. Marcar como `TODO: REQUIERE VALIDACIÓN` cualquier dato comercial, legal o corporativo no confirmado.
18. No incluir secretos, tokens o API keys en el repositorio.
19. No procesar ni almacenar más datos personales de los necesarios.
20. Entregar cada módulo con criterios de aceptación verificables.

## 2.2 Protocolo de ejecución

Antes de escribir código, la IA debe:

1. Leer los cuatro documentos maestros completos.
2. Identificar el módulo solicitado.
3. Enumerar dependencias técnicas y funcionales.
4. Identificar migraciones y modelos involucrados.
5. Identificar rutas, controladores, servicios, vistas y políticas necesarios.
6. Identificar pruebas requeridas.
7. Verificar que la propuesta no contradiga este manifiesto.

Al concluir cada módulo, la IA debe entregar:

```text
1. Resumen del módulo implementado
2. Archivos creados o modificados
3. Migraciones involucradas
4. Variables de entorno requeridas
5. Instrucciones de instalación
6. Pruebas automatizadas
7. Pruebas manuales
8. Criterios de aceptación cubiertos
9. Riesgos o elementos pendientes de validación
```

---

# 3. VISIÓN DEL PRODUCTO

Construir un ecosistema web empresarial centralizado, modular, administrable y orientado a conversión que permita a NG TECHNOLOGY posicionar y comercializar su portafolio completo en México.

La plataforma debe combinar:

- Portal corporativo.
- Catálogo de soluciones empresariales.
- Landing pages especializadas.
- Captación y gestión inicial de leads.
- Centro de contenidos.
- Blog y recursos educativos.
- Biblioteca de videos.
- Integración con el canal de YouTube de Nolan Muñoz Durán.
- Marca personal enfocada en inteligencia artificial aplicada a negocios.
- SEO técnico y local para México.
- GEO y preparación semántica para motores de respuesta e IA.
- Panel administrativo propio.
- Analítica y medición de conversiones.

El producto no debe comportarse como un sitio institucional estático. Debe actuar como una plataforma comercial y editorial medible.

---

# 4. OBJETIVOS DE NEGOCIO

## 4.1 Objetivos primarios

1. Posicionar a NG TECHNOLOGY en el mercado mexicano.
2. Generar oportunidades comerciales B2B.
3. Presentar de manera clara las 15 verticales comerciales.
4. Facilitar solicitudes de demostración, diagnóstico, asesoría y cotización.
5. Capturar el origen, la vertical y el contexto de cada lead.
6. Conectar contenido educativo con oportunidades comerciales.
7. Posicionar a Nolan Muñoz Durán como referente en IA aplicada a negocios.
8. Construir una base tecnológica reutilizable para futuras expansiones.

## 4.2 Objetivos secundarios

- Mejorar la autoridad temática del dominio.
- Publicar contenido especializado para México.
- Medir el rendimiento de páginas, campañas, videos y formularios.
- Reducir dependencia técnica para actualizar contenido.
- Estandarizar publicación, revisión y aprobación de materiales.
- Preparar el ecosistema para integraciones futuras con CRM, automatización y herramientas de Microsoft 365.

---

# 5. DECISIONES ARQUITECTÓNICAS DEFINITIVAS

```yaml
architecture_version: 1
application_style: modular_monolith
site_model: single_site
market: Mexico
primary_locale: es-MX
timezone: America/Mexico_City
currency: MXN
backend: PHP 8.2+
framework: Laravel 12
web_server: Apache 2.4
hosting: cPanel compatible
frontend_rendering: Blade server-side rendering
css: Tailwind CSS compiled
javascript: Vanilla JS plus Alpine.js
animations: CSS and Intersection Observer; GSAP optional and lazy-loaded
database: MySQL 8.0 or MariaDB 10.6+
cache_default: file or database
queue_default: database
scheduler: cPanel cron
cms_model: predefined component builder
admin_authentication: session based
password_hashing: Argon2id preferred
public_root: public_html or Laravel public document root
personal_brand: integrated section in the main portal
youtube_sync: scheduled every 12 hours when API is enabled
seo_model: centralized metadata plus generated structured data
lead_model: lightweight internal lead pipeline
```

## 5.1 Modelo de sitio

La versión 1 se implementará como un solo sitio bajo un dominio principal.

Las soluciones utilizarán subdirectorios:

```text
/soluciones/erp-sicla/
/soluciones/kommo-crm/
/soluciones/marshal-ia/
```

No se implementarán sitios independientes ni subdominios por vertical en la versión 1.

## 5.2 Marca personal

La marca personal de Nolan Muñoz Durán se implementará dentro del dominio principal:

```text
/nolan-munoz-duran/
/recursos/inteligencia-artificial/
/videos/
```

La arquitectura debe permitir una migración futura a un subdominio o portal independiente, sin implementarla en la versión 1.

## 5.3 CMS

El CMS será un **constructor por componentes predefinidos**.

Permitirá:

- Seleccionar tipos de sección autorizados.
- Ordenar secciones.
- Activar o desactivar secciones.
- Editar contenido y configuración.
- Previsualizar antes de publicar.

No incluirá:

- Edición libre de HTML.
- Constructor visual arbitrario.
- Drag and drop absoluto.
- Plugins de terceros instalables desde el panel.
- Ejecución de PHP desde contenidos.

---

# 6. ALCANCE FUNCIONAL DE LA VERSIÓN 1

## 6.1 Portal público

El portal público debe incluir:

```text
Inicio
Nosotros
Soluciones
Detalle de cada solución
Servicios
Recursos
Blog
Artículos
Casos de éxito
Videos
Preguntas frecuentes
Marca personal de Nolan Muñoz Durán
Contacto
Solicitar demostración
Diagnóstico de IA
Aviso de privacidad
Política de cookies
Términos aplicables
```

## 6.2 Panel administrativo

El panel debe incluir:

```text
Dashboard
Páginas
Secciones de página
Soluciones
Artículos
Recursos
Casos de éxito
Videos
Preguntas frecuentes
Banners
Menús
Medios
Formularios
Leads
SEO
Redirecciones
Usuarios
Roles y permisos
Integraciones
Configuración
Auditoría
```

## 6.3 Capacidades transversales

- Autenticación y autorización.
- Gestión editorial por estados.
- Carga segura de medios.
- Metadata SEO por contenido.
- JSON-LD dinámico.
- Sitemap dinámico.
- Robots configurable por reglas controladas.
- Formularios con protección antispam.
- Registro y asignación de leads.
- Auditoría administrativa.
- Notificaciones por correo.
- Analítica de conversiones.
- Integración programada con YouTube.

---

# 7. VERTICALES OBLIGATORIAS

Todas las verticales deben existir en el CMS y contar con una landing page administrable.

| Código | Vertical | Clasificación inicial | Conversión principal sugerida |
|---|---|---|---|
| V01 | ERP SICLA® | Solución empresarial | Solicitar demostración |
| V02 | Recursos Humanos | Solución empresarial | Solicitar diagnóstico |
| V03 | Kommo CRM | Solución empresarial | Evaluar CRM |
| V04 | Digital Card | Solución empresarial | Solicitar demostración |
| V05 | NEXT-GATE | Solución empresarial | Solicitar levantamiento técnico |
| V06 | Facturación Electrónica | Solución empresarial | Consultar viabilidad para México |
| V07 | Microsoft / Google | Servicio tecnológico | Solicitar assessment |
| V08 | Telemetría GPS | Solución empresarial | Solicitar demostración |
| V09 | My Marchamo | Solución empresarial | Registrar interés |
| V10 | Marshal IA | Solución de IA | Solicitar discovery |
| V11 | My Negocio .Shop | Solución de comercio electrónico | Solicitar diagnóstico |
| V12 | Servicios de Agencia | Servicio profesional | Completar brief |
| V13 | Innovate 360° | Consultoría | Agendar diagnóstico |
| V14 | Desarrollo de Software | Servicio profesional | Solicitar evaluación técnica |
| V15 | Formación en Inteligencia Artificial | Formación | Solicitar información |
| V16 | Marca personal + YouTube | Contenido y autoridad | Ver contenidos o contactar |

## 7.1 Regla de modelado

Las 15 verticales comerciales se almacenarán con:

```yaml
content_type: solution
```

La clasificación comercial secundaria se manejará mediante taxonomías:

```text
Software
Cloud
Inteligencia artificial
IoT
Comercio electrónico
Servicios profesionales
Consultoría
Formación
```

La marca personal se manejará como una página especializada, no como una solución comercial.

## 7.2 Requisitos mínimos de cada landing

Cada landing debe admitir:

1. Hero.
2. Problema o necesidad.
3. Propuesta de valor.
4. Beneficios.
5. Funcionalidades o alcance.
6. Casos de uso.
7. Sectores aplicables.
8. Evidencias o recursos autorizados.
9. Preguntas frecuentes.
10. CTA principal.
11. CTA secundario.
12. Formulario asociado.
13. Metadata SEO.
14. JSON-LD.
15. Eventos de analítica.
16. Breadcrumbs.
17. Contenido relacionado.

---

# 8. USUARIOS OBJETIVO

## 8.1 Dirección general

Necesidades:

- Visibilidad del negocio.
- Control operativo.
- Crecimiento.
- Transformación digital.
- Automatización.
- Retorno de inversión.

## 8.2 Dirección de tecnología

Necesidades:

- Arquitectura.
- Integraciones.
- Seguridad.
- Infraestructura.
- Escalabilidad.
- Soporte.

## 8.3 Dirección comercial

Necesidades:

- CRM.
- Seguimiento.
- Automatización comercial.
- Generación de oportunidades.
- Analítica de conversión.

## 8.4 Operaciones y administración

Necesidades:

- ERP.
- Recursos humanos.
- Control de acceso.
- Telemetría.
- Facturación.
- Automatización de procesos.

## 8.5 PyMEs y personas emprendedoras

Necesidades:

- Comercio electrónico.
- Productividad.
- Marketing.
- Automatización accesible.
- Capacitación.

## 8.6 Audiencia educativa y profesional

Necesidades:

- Contenido práctico.
- Casos de uso de IA.
- Cursos y talleres.
- Recursos descargables.
- Videos.

---

# 9. ARQUITECTURA DE INFORMACIÓN

```text
/
├── nosotros/
├── soluciones/
│   ├── erp-sicla/
│   ├── recursos-humanos/
│   ├── kommo-crm/
│   ├── digital-card/
│   ├── next-gate/
│   ├── facturacion-electronica/
│   ├── microsoft-google/
│   ├── telemetria-gps/
│   ├── my-marchamo/
│   ├── marshal-ia/
│   ├── my-negocio-shop/
│   ├── servicios-de-agencia/
│   ├── innovate-360/
│   ├── desarrollo-de-software/
│   └── formacion-inteligencia-artificial/
├── recursos/
│   ├── blog/
│   ├── casos-de-exito/
│   ├── videos/
│   ├── webinars/
│   └── descargables/
├── nolan-munoz-duran/
├── solicitar-demostracion/
├── diagnostico-ia/
├── contacto/
├── aviso-de-privacidad/
├── politica-de-cookies/
└── terminos/
```

## 9.1 Navegación principal

```text
Inicio
Soluciones
Recursos
Casos de éxito
Videos
Nosotros
Contacto
```

CTA persistente recomendado:

```text
Solicitar demostración
```

---

# 10. JERARQUÍA DE CONVERSIÓN

## CTA principal

```text
Solicitar demostración
```

## CTA secundario

```text
Hablar con un asesor
```

## CTA terciario

```text
Realizar diagnóstico de IA
```

Cada contenido debe tener un objetivo de conversión definido. No deben agregarse formularios sin propietario comercial, propósito y ruta de seguimiento.

---

# 11. SISTEMA DE LEADS

## 11.1 Formularios requeridos

```text
Contacto general
Solicitud de demostración
Solicitud de asesoría
Solicitud de cotización
Diagnóstico de IA
Descarga de recurso
Suscripción a contenidos
```

## 11.2 Datos mínimos

Según el formulario:

```text
Nombre
Empresa
Correo electrónico
Teléfono
Estado de México
Industria
Número aproximado de colaboradores
Solución de interés
Necesidad
Mensaje
Consentimiento
URL de origen
Vertical de origen
UTM source
UTM medium
UTM campaign
UTM content
UTM term
Fecha y hora
```

## 11.3 Estados oficiales

```yaml
new: Nuevo
assigned: Asignado
contacted: Contactado
qualified: Calificado
proposal: Propuesta
won: Ganado
lost: Perdido
discarded: Descartado
```

## 11.4 Reglas

- Todo lead debe tener fecha, formulario y origen.
- La asignación es opcional al crearse, pero debe ser auditable.
- No se debe borrar un lead desde la interfaz ordinaria.
- Debe existir exportación solo para roles autorizados.
- El sistema debe permitir registrar notas de seguimiento sin convertirlo en un CRM completo.
- Las integraciones con CRM externo se consideran extensiones posteriores o configurables.

---

# 12. CENTRO DE CONTENIDOS

El centro de contenidos debe agrupar:

```text
Artículos
Videos
Casos de éxito
Webinars
Recursos descargables
Preguntas frecuentes temáticas
```

## 12.1 Tipos de contenido oficiales

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

## 12.2 Flujo editorial

```text
Borrador
↓
En revisión
↓
Aprobado
↓
Programado
↓
Publicado
↓
Archivado
```

La publicación debe registrar usuario y fecha.

---

# 13. MARCA PERSONAL Y YOUTUBE

## 13.1 Objetivo

Conectar educación, autoridad profesional y generación de oportunidades relacionadas con inteligencia artificial aplicada a negocios.

## 13.2 Componentes

- Página de perfil.
- Propuesta temática.
- Videos destacados.
- Biblioteca de videos.
- Artículos relacionados.
- Recursos descargables.
- CTA hacia diagnóstico, formación o contacto.

## 13.3 Integración con YouTube

Cuando se configure la API:

```text
YouTube Data API
↓
Comando programado
↓
Validación y normalización
↓
Tabla videos
↓
Caché
↓
Frontend
```

Frecuencia predeterminada:

```yaml
every: 12 hours
```

La sincronización debe:

- Actualizar videos existentes por `external_id`.
- Evitar duplicados.
- Conservar asociaciones editoriales locales.
- Registrar errores sin interrumpir el sitio.
- Utilizar el último conjunto sincronizado si la API no está disponible.
- No exponer la API key.

Los iframes de YouTube deben cargarse después de la interacción del usuario o mediante una estrategia ligera equivalente.

---

# 14. STACK TECNOLÓGICO OBLIGATORIO

## 14.1 Backend

```yaml
language: PHP 8.2+
framework: Laravel 12
architecture: MVC modular monolith
coding_standard: PSR-12
orm: Eloquent
validation: Form Requests
authorization: Policies and Gates
business_logic: Service Layer
complex_queries: Repository or Query Object when justified
```

## 14.2 Frontend

```yaml
templating: Blade
css: Tailwind CSS
javascript: Vanilla JS
progressive_interactivity: Alpine.js
animation_baseline: CSS plus Intersection Observer
advanced_animation: GSAP optional and lazy-loaded
```

## 14.3 Datos

```yaml
database: MySQL 8.0 preferred
alternative: MariaDB 10.6+
engine: InnoDB
charset: utf8mb4
collation: utf8mb4_unicode_ci
application_storage_timezone: UTC
presentation_timezone: America/Mexico_City
```

## 14.4 Infraestructura

```yaml
hosting: cPanel
web_server: Apache
ssl: required
scheduler: cron
queue: database with short-lived workers
mail: SMTP
storage: local filesystem
```

## 14.5 Herramientas de compilación

Node.js puede utilizarse solo durante desarrollo o compilación de activos.

No debe requerirse Node.js en ejecución permanente en producción.

Los activos compilados deben incluirse en el paquete desplegable.

---

# 15. ARQUITECTURA DE DESPLIEGUE

```text
/home/USUARIO_CPANEL/
├── ng_mexico_app/
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/
│   ├── .env
│   └── artisan
├── public_html/
│   ├── build/
│   ├── images/
│   ├── storage -> ../ng_mexico_app/storage/app/public
│   ├── index.php
│   ├── robots.txt
│   └── .htaccess
└── backups_private/
```

Solo `public_html` o el directorio `public` de Laravel debe ser accesible desde internet.

`.env`, `vendor`, `storage/app/private`, logs, respaldos, migraciones y código fuente no deben exponerse.

---

# 16. SEGURIDAD

## 16.1 Requisitos obligatorios

- HTTPS obligatorio.
- `APP_DEBUG=false` en producción.
- Hashing Argon2id preferido.
- Protección CSRF.
- Cookies `Secure`, `HttpOnly` y `SameSite=Lax`.
- Regeneración de sesión al autenticar.
- Rate limiting en autenticación y formularios.
- Policies y Gates por recurso.
- Validación de servidor mediante Form Requests.
- Escape de salida por defecto.
- Sanitización de HTML permitido.
- Validación real de MIME para archivos.
- Bloqueo de ejecución en directorios de carga.
- Credenciales cifradas.
- Auditoría de cambios críticos.
- Encabezados de seguridad.
- Respaldo fuera del directorio público.

## 16.2 Archivos y rutas sensibles

Deben bloquearse:

```text
.env
.env.*
/vendor
/config
/database
/tests
/storage/app/private
/storage/logs
composer.json
composer.lock
artisan
phpunit.xml
archivos .sql
archivos .log
respaldos
```

## 16.3 Roles iniciales

```text
Superadministrador
Administrador
Editor
Marketing
Comercial
Auditor
```

Cada permiso debe asignarse por capacidad, no por condición implícita.

---

# 17. SEO, GEO E INDEXACIÓN PARA IA

## 17.1 SEO técnico

Cada contenido publicable debe admitir:

- Meta title.
- Meta description.
- Canonical.
- Directiva robots.
- Open Graph.
- Twitter/X card.
- Imagen social.
- Hreflang.
- Inclusión en sitemap.
- Prioridad y frecuencia orientativas.
- JSON-LD.
- Redirecciones.

## 17.2 Localización México

```yaml
html_lang: es-MX
locale: es-MX
timezone: America/Mexico_City
currency: MXN
visible_date_format: DD/MM/AAAA
technical_date_format: ISO-8601
country_calling_code: +52
```

La terminología comercial debe priorizar expresiones naturales para México:

```text
Solicitar demostración
Hablar con un asesor
Solicitar cotización
Solución empresarial
Automatización de procesos
Transformación digital
```

## 17.3 Datos estructurados

Implementar dinámicamente cuando correspondan al contenido visible:

```text
Organization
WebSite
WebPage
Service
Article
VideoObject
FAQPage
BreadcrumbList
Person
```

No generar:

- Reseñas inexistentes.
- Calificaciones inventadas.
- Precios no aprobados.
- Domicilios no confirmados.
- Certificaciones no verificadas.
- FAQ no visible.

## 17.4 Sitemaps

```text
/sitemap.xml
/sitemaps/pages.xml
/sitemaps/solutions.xml
/sitemaps/articles.xml
/sitemaps/resources.xml
/sitemaps/videos.xml
```

Solo deben incluirse URLs canónicas, publicadas e indexables.

## 17.5 Rastreadores de IA

El sistema debe permitir gestionar políticas para:

```text
OAI-SearchBot
GPTBot
Claude-SearchBot
Claude-User
ClaudeBot
PerplexityBot
Google-Extended
```

La política debe diferenciar visibilidad en buscadores o respuestas de la autorización para usos de entrenamiento cuando el proveedor ofrezca controles separados.

La configuración inicial se definirá antes del lanzamiento y debe poder cambiarse sin modificar el código fuente.

## 17.6 GEO y citabilidad

Los contenidos prioritarios deben:

- Responder preguntas concretas con lenguaje claro.
- Identificar autor, organización y fecha de revisión cuando aplique.
- Incluir definiciones, procesos, preguntas frecuentes y fuentes propias verificables.
- Mantener encabezados semánticos.
- Evitar afirmaciones vagas o no verificables.
- Incluir páginas institucionales claras.
- Relacionar artículos, soluciones, videos y casos de uso.
- Presentar datos estructurados coherentes con el contenido visible.

---

# 18. RENDIMIENTO Y CORE WEB VITALS

## 18.1 Objetivos

```yaml
mobile_lighthouse_target: 90 or higher
lcp_target: less than 2.5 seconds
cls_target: less than 0.1
inp_target: less than 200 milliseconds
```

Los objetivos deben evaluarse en páginas representativas y bajo condiciones acordadas de prueba. No deben lograrse eliminando contenido requerido.

## 18.2 Reglas

- Renderizado HTML en servidor.
- JavaScript con `defer` o carga condicional.
- Imágenes WebP o AVIF.
- Dimensiones declaradas.
- Lazy loading fuera del primer viewport.
- Fuentes WOFF2 locales cuando sea posible.
- `font-display: swap`.
- CSS depurado.
- Caché de configuración, rutas y vistas.
- No cargar iframe de YouTube al inicio.
- No usar videos automáticos pesados en móvil.
- No usar parallax pesado.
- Respetar `prefers-reduced-motion`.
- Cargar GSAP solo donde exista una necesidad aprobada.

---

# 19. ACCESIBILIDAD

Objetivo mínimo:

```yaml
standard: WCAG 2.2 AA
```

Requisitos:

- Navegación por teclado.
- Foco claramente visible.
- Enlace para saltar navegación.
- Contraste suficiente.
- Etiquetas asociadas a controles.
- Mensajes de error accesibles.
- Texto alternativo administrable.
- Encabezados jerárquicos.
- Menús y acordeones con ARIA pertinente.
- No depender exclusivamente del color.
- Reducción de movimiento.
- Controles táctiles adecuados.
- Zoom sin pérdida funcional.

---

# 20. ANALÍTICA Y CONVERSIONES

## 20.1 Integraciones previstas

```text
Google Tag Manager
Google Analytics 4
Meta Pixel, sujeto a aprobación y consentimiento
YouTube
```

## 20.2 Eventos mínimos

```text
view_solution
select_solution
click_primary_cta
click_secondary_cta
click_demo
form_start
form_submit
form_error
contact_click
phone_click
video_start
video_complete
resource_download
search
```

Parámetros recomendados:

```text
vertical_code
content_id
content_type
cta_name
form_name
market
language
utm_source
utm_medium
utm_campaign
```

Los scripts sujetos a consentimiento no deben ejecutarse antes de la elección aplicable del usuario.

---

# 21. PANEL ADMINISTRATIVO

## 21.1 Dashboard

Debe mostrar, según permisos y datos disponibles:

- Leads recientes.
- Leads por estado.
- Formularios con actividad.
- Contenidos en revisión.
- Contenidos programados.
- Errores recientes de sincronización.
- Estado del sitemap.
- Actividad administrativa reciente.

No debe sustituir una plataforma completa de BI.

## 21.2 Editor por componentes

Tipos iniciales de sección:

```text
Hero
Texto enriquecido controlado
Beneficios
Características
Tarjetas
Estadísticas
Proceso
Casos de uso
Sectores
Imagen y texto
Video
Testimonios autorizados
Casos de éxito
FAQ
CTA
Formulario
Recursos relacionados
Contenido relacionado
```

Cada tipo debe tener un esquema de configuración validado.

## 21.3 Previsualización y publicación

- Vista previa protegida por autorización.
- Borrador no indexable.
- Publicación manual o programada.
- Registro de quién publica.
- Limpieza de caché al publicar.
- Actualización del sitemap cuando corresponda.

---

# 22. BASE DE DATOS

La implementación debe incluir como mínimo:

```text
users
roles
permissions
role_user
permission_role
media
contents
content_sections
taxonomies
content_taxonomy
seo_metadata
banners
faqs
forms
form_submissions
videos
redirects
settings
api_credentials
audit_logs
jobs
failed_jobs
```

La definición detallada corresponde a `DATABASE_SPECIFICATION.md`.

## 22.1 Reglas de datos

- InnoDB.
- `utf8mb4`.
- Llaves foráneas.
- Índices para filtros frecuentes.
- Soft delete solo donde tenga sentido.
- Fechas almacenadas en UTC.
- Credenciales cifradas.
- Slugs únicos por locale.
- Datos dinámicos en JSON solo cuando la estructura varíe justificadamente.
- Evitar almacenar información derivable o duplicada sin razón.

---

# 23. INTEGRACIONES

## 23.1 Permitidas en V1

- SMTP.
- YouTube Data API.
- Google Tag Manager.
- Google Analytics 4.
- Meta Pixel sujeto a aprobación.
- Webhooks comerciales configurables, si se aprueban.

## 23.2 Reglas

- Toda integración debe estar encapsulada en un servicio.
- Utilizar timeouts.
- Registrar errores sin secretos.
- Implementar reintentos limitados cuando aplique.
- No bloquear el renderizado público por una API externa.
- Mantener una experiencia funcional si la integración falla.
- Configurar credenciales mediante `.env` o almacenamiento cifrado.

---

# 24. CALIDAD Y PRUEBAS

## 24.1 Pruebas automatizadas mínimas

```text
Autenticación
Autorización por roles y permisos
CRUD de contenidos
Publicación
Formularios
Validación y CSRF
Registro de leads
SEO metadata
Sitemap
Redirecciones
Carga de medios
Sincronización de YouTube
Auditoría
```

## 24.2 Pruebas manuales

- Navegación móvil y escritorio.
- Teclado.
- Lectura de formularios y errores.
- Correos.
- Responsive.
- Rendimiento.
- Metadata.
- JSON-LD.
- Indexación.
- Consentimiento.
- Carga de medios.
- Permisos administrativos.
- Recuperación ante errores externos.

## 24.3 Definition of Done

Un módulo está terminado cuando:

1. Cumple sus requisitos funcionales.
2. Tiene validación de entrada.
3. Tiene autorización.
4. Tiene manejo de errores.
5. Tiene pruebas automatizadas.
6. Tiene pruebas manuales documentadas.
7. No expone secretos ni datos innecesarios.
8. Cumple accesibilidad aplicable.
9. Cumple SEO aplicable.
10. No introduce regresiones de rendimiento.
11. Está documentado.
12. Puede desplegarse en cPanel.

---

# 25. CONTENIDO Y LOCALIZACIÓN

## 25.1 Reglas editoriales

- Utilizar español natural para México.
- Evitar regionalismos costarricenses en páginas dirigidas a México.
- Mantener nombres de marcas registrados según su forma oficial.
- No prometer capacidades no verificadas.
- No publicar cumplimiento con SAT, CFDI o PAC sin validación especializada.
- No presentar precios sin aprobación.
- Utilizar fechas visibles en formato `DD/MM/AAAA`.
- Presentar importes con moneda explícita.
- Identificar el territorio de cobertura real.

## 25.2 Contenido pendiente

Cuando falte información, utilizar marcadores explícitos:

```text
TODO: REQUIERE CONTENIDO APROBADO
TODO: REQUIERE VALIDACIÓN COMERCIAL
TODO: REQUIERE VALIDACIÓN LEGAL MÉXICO
TODO: REQUIERE ACTIVO DE MARCA
TODO: REQUIERE URL O CREDENCIAL
```

No reemplazar esos marcadores con información inventada.

---

# 26. FUERA DE ALCANCE DE LA VERSIÓN 1

No implementar en V1:

```text
Marketplace
Directorio de empresas
LMS completo
Pasarela de pago
Portal privado de clientes
Facturación interna del portal
CRM empresarial completo
Aplicación móvil nativa
Arquitectura multisitio
Multiempresa
Multipaís operativo
Multilingüe completo
Microservicios
Servidor Node.js persistente
Chatbot generativo autónomo
Automatizaciones empresariales para clientes
Sistema de tickets
Sistema de suscripciones pagadas
```

Estos elementos pueden aparecer en el roadmap, pero no deben generar tablas, rutas, módulos ni dependencias en V1 salvo extensibilidad razonable.

`negociosenlomas.com` y el concepto de directorio empresarial deberán manejarse como iniciativa futura independiente hasta que exista un PRD aprobado.

---

# 27. ROADMAP FUTURO

Posibles fases posteriores:

```text
Fase futura A: Directorio empresarial
Fase futura B: Diagnóstico automatizado de madurez digital
Fase futura C: Marketplace de servicios
Fase futura D: LMS y academia
Fase futura E: Portal de clientes
Fase futura F: Integración profunda con CRM
Fase futura G: Automatizaciones empresariales con IA
Fase futura H: Expansión por país e idioma
```

Ninguna posibilidad futura debe alterar la entrega de V1.

---

# 28. ENTREGABLES TÉCNICOS

La IA de desarrollo debe producir:

```text
Código fuente Laravel
Migraciones
Seeders
Factories de prueba
Modelos y relaciones
Form Requests
Policies y Gates
Servicios
Controladores
Rutas
Blade components
Vistas públicas
Vistas administrativas
Activos compilados
Pruebas automatizadas
Configuración de cron
Plantilla .env.example
.htaccess
robots.txt configurable
Generador de sitemap
JSON-LD dinámico
README de instalación
Guía de despliegue cPanel
Guía operativa del CMS
Matriz de permisos
Plan de pruebas
```

---

# 29. ORDEN RECOMENDADO DE IMPLEMENTACIÓN

```text
1. Entorno y estructura base
2. Autenticación, roles y permisos
3. Base de datos y seeders
4. Medios
5. CMS y component builder
6. Soluciones y landings
7. Formularios y leads
8. SEO, sitemap, robots y JSON-LD
9. Blog, recursos y casos de éxito
10. Marca personal y YouTube
11. Analítica y consentimiento
12. Auditoría
13. Rendimiento y accesibilidad
14. QA integral
15. Despliegue y estabilización
```

---

# 30. CRITERIOS DE ACEPTACIÓN DEL PRODUCTO

El MVP se considera aceptable cuando:

- [ ] El portal funciona en cPanel con PHP 8.2+ y MySQL/MariaDB compatible.
- [ ] La raíz pública está separada del núcleo privado.
- [ ] El panel administrativo requiere autenticación.
- [ ] Roles y permisos restringen correctamente cada módulo.
- [ ] El CMS administra páginas mediante componentes predefinidos.
- [ ] Las 15 verticales comerciales están creadas y administrables.
- [ ] La sección de marca personal y YouTube está implementada.
- [ ] Cada vertical admite CTA, formulario, SEO, JSON-LD y contenido relacionado.
- [ ] Los formularios validan y almacenan leads.
- [ ] Los leads registran origen, vertical y parámetros UTM disponibles.
- [ ] El pipeline utiliza los estados oficiales.
- [ ] La biblioteca de videos funciona aun si la API externa falla temporalmente.
- [ ] El sitemap contiene solo URLs publicadas, canónicas e indexables.
- [ ] Robots contempla buscadores tradicionales y rastreadores de IA.
- [ ] Las páginas públicas utilizan `es-MX`.
- [ ] Las fechas visibles usan `DD/MM/AAAA`.
- [ ] Los precios, si existen, identifican MXN.
- [ ] El contenido fiscal mexicano exige aprobación antes de publicarse.
- [ ] No existen secretos dentro del repositorio o `public_html`.
- [ ] Los archivos sensibles no son accesibles por HTTP.
- [ ] Las pruebas críticas están automatizadas.
- [ ] La navegación cumple los criterios de accesibilidad definidos.
- [ ] Las páginas representativas alcanzan los objetivos de rendimiento acordados.
- [ ] Los eventos de conversión se verifican sin duplicidad.
- [ ] El despliegue, cron, respaldo y reversa están documentados.
- [ ] No se implementó funcionalidad fuera de alcance.

---

# 31. DECISIONES PENDIENTES DE NEGOCIO

Las siguientes variables deben confirmarse antes de producción:

```text
Dominio definitivo
Razón social que se mostrará
Datos de contacto para México
Cobertura geográfica real
Responsable comercial de cada vertical
Correos de notificación
Canal de seguimiento de leads
Textos legales y aviso de privacidad
Política de cookies y consentimiento
Política para bots de entrenamiento
Perfiles sociales oficiales
Canal y playlists oficiales de YouTube
Precios que podrán publicarse
Testimonios y casos autorizados
Alcance exacto de Facturación Electrónica para México
Uso de CFDI 4.0 y relación con PAC, si corresponde
Identidad visual final
Credenciales de analítica
Criterios y entorno de medición de rendimiento
```

La aplicación debe permitir configurar estos elementos sin modificar la arquitectura.

---

# 32. CONTROL DE CAMBIOS

Toda modificación estructural debe documentar:

```text
ID del cambio
Fecha
Solicitante
Motivo
Descripción
Impacto funcional
Impacto técnico
Impacto en datos
Impacto en seguridad
Impacto en SEO
Impacto en plazo
Decisión
Aprobador
Versión afectada
```

Requieren aprobación explícita:

- Cambio de stack.
- Incorporación de un servicio externo obligatorio.
- Conversión a multisitio.
- Separación de la marca personal.
- Nuevo tipo de dato sensible.
- Nueva integración comercial.
- Inclusión de pagos.
- Inclusión de LMS o marketplace.
- Cambio de política sobre bots de IA.
- Cambios regulatorios o fiscales.

---

# 33. DEFINICIÓN DE ÉXITO

La versión 1 será exitosa si entrega una plataforma:

- Operativa en cPanel.
- Clara para el mercado mexicano.
- Administrable sin editar código.
- Capaz de presentar todas las verticales.
- Capaz de capturar y clasificar oportunidades.
- Capaz de conectar contenido y video con conversión.
- Segura y auditable.
- Rápida y accesible.
- Indexable por buscadores.
- Semánticamente preparada para motores de respuesta e IA.
- Extensible sin incorporar prematuramente módulos futuros.

---

# 34. APROBACIÓN DEL MANIFIESTO

Este archivo representa la versión final consolidada del manifiesto del producto.

Cualquier documento técnico posterior deberá mantener compatibilidad con estas decisiones.

```yaml
document: PROJECT_MANIFEST.md
version: 2.0
status: final
source_of_truth: true
requires_change_control: true
```
