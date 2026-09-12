# TAREAS QUE SOLO TÚ PUEDES HACER
## (ni Claude ni Antigravity pueden hacer esto por ti)

---

## 0. HALLAZGO TÉCNICO — ARCHIVO A CORREGIR

`SYSTEM_ARCHITECTURE.md` (el que subiste) tiene duplicado adentro el
contenido completo de `PROJECT_MANIFEST.md` en sus primeras 1501 líneas —
el contenido propio de arquitectura empieza recién en la línea 1502. Te
generé `SYSTEM_ARCHITECTURE_LIMPIO.md` con solo el contenido real; reemplaza
el archivo original por este antes de dárselo a Antigravity, para no
duplicar 1500 líneas de contexto en cada sesión.

---

## 0.1 PENDIENTES REALES DETECTADOS EN PROJECT_MANIFEST.md SECCIÓN 31

El propio manifiesto (máxima autoridad) tiene una lista formal de
"Decisiones Pendientes de Negocio". Ya resolvimos dominio, razón social y
fecha de lanzamiento. Esto es lo que **falta** de esa misma lista oficial:

- [ ] **Datos de contacto para México** (teléfono, correo comercial, dirección si aplica)
- [ ] **Cobertura geográfica real** (¿todo México o zonas específicas al inicio?)
- [ ] **Responsable comercial de cada una de las 15 verticales** (para asignación de leads)
- [ ] **Correos de notificación** de leads por formulario/vertical
- [ ] **Canal de seguimiento de leads** (¿WhatsApp Business, CRM externo, solo correo?)
- [ ] **Textos legales y aviso de privacidad** (LFPDPPP — ya estaba en tu checklist)
- [ ] **Política de cookies y consentimiento**
- [ ] **Política para bots de entrenamiento de IA** — el manifiesto distingue
      explícitamente entre "permitir que un bot de IA lea/cite tu contenido"
      y "autorizar que use tu contenido para entrenar su modelo". Ya lo dejé
      configurado como editable por bot individual en `PROMPT_PARA_ANTIGRAVITY.md`,
      pero la decisión de política en sí es tuya.
- [ ] **Perfiles sociales oficiales** (para `sameAs` del Organization JSON-LD)
- [ ] **Canal y playlists oficiales de YouTube**
- [ ] **Precios que podrán publicarse** (el manifiesto prohíbe publicar precios sin aprobación explícita)
- [ ] **Testimonios y casos de éxito autorizados** (nombres reales de clientes que permiten ser mencionados)
- [ ] **Alcance exacto de Facturación Electrónica para México** (uno de tus productos/verticales)
- [ ] **Uso de CFDI 4.0 y relación con PAC**, si corresponde — el manifiesto
      prohíbe explícitamente afirmar cumplimiento fiscal/SAT sin validación especializada
- [ ] **Identidad visual final** (ya sabemos que el logo está en proceso)
- [ ] **Credenciales de analítica** (ya estaba en tu checklist: GA4, GTM)
- [ ] **Criterios y entorno de medición de rendimiento** (¿quién valida Lighthouse/Core Web Vitals antes de cada Go-Live?)

No necesitas resolver todo esto ahora mismo — Antigravity puede avanzar con
el Sprint 1 (Foundation) sin estos datos, usando los marcadores
`TODO: REQUIERE VALIDACIÓN COMERCIAL` / `TODO: REQUIERE VALIDACIÓN LEGAL MÉXICO`
/ `TODO: REQUIERE ACTIVO DE MARCA` que ya quedaron definidos en el prompt.
Pero varios de estos SÍ bloquean sprints específicos (ej. sin "responsable
comercial por vertical" no se puede probar la asignación de leads del
Sprint 4).

---
✅ cPanel contratado y activo
✅ Dominio: `ngintelligencegroup.com`
✅ Base de datos creada: `ngint380_ng2026`
✅ Usuario de base de datos: `ngint380_2026ng`

> Nota: no compartas aquí ni con Antigravity la **contraseña** de la base de
> datos, ni ninguna API key real. Esos valores van directo al archivo `.env`
> en el servidor, nunca en un chat ni en un prompt.

> ✅ **Resuelto:** marca comercial = **NG Intelligence Group**, razón social =
> **NG TECHNOLOGY S.A.**, fundada el 21 de diciembre de 2001 en Costa Rica,
> expandida por Latinoamérica. Ver `ADDENDUM_CAMBIO_MARCA.md` para el modelo
> completo (ya incorporado en `PROMPT_PARA_ANTIGRAVITY.md`, incluyendo
> `foundingDate` y `foundingLocation` en el JSON-LD).
>
> ✅ **Resuelto:** dominio único y definitivo = `ngintelligencegroup.com`.
> No hay dominios anteriores que redirigir.
>
> ✅ **Resuelto (decisión final del equipo):** el sitio se publica en
> **tiempo presente**, como si la operación en México ya estuviera activa —
> sin "Próximamente", sin condicionar contenido a la fecha de lanzamiento
> oficial. El objetivo es usar el sitio como insumo de campañas de marca y
> publicidad antes del lanzamiento formal de enero 2027. `launch_date` se
> conserva solo como dato interno de planeación, sin efecto en el frontend.

### ⚠️ Acción tuya antes de publicar (no técnica, pero crítica):
- [ ] **Confirmar que el equipo comercial/atención a leads está listo para
      operar desde el día en que el sitio se publique**, no desde enero 2027.
      Los formularios de Contacto/Demo/Diagnóstico IA/Cotización generarán
      leads reales de inmediato. Si nadie va a dar seguimiento a esos
      contactos hasta 2027, se pierde el esfuerzo de marketing que están
      buscando lograr con esta publicación anticipada — vale la pena
      resolverlo antes del Go-Live, no después.
- [ ] Definir quién recibe la notificación de nuevos leads (correo/rol) desde
      el primer día de publicación.

### Pendiente de tu parte para que el JSON-LD quede 100% correcto:
- [x] Año de fundación confirmado: 21 de diciembre de 2001.
- [x] Fecha de lanzamiento oficial confirmada: enero de 2027.
- [ ] Confirmar si "NG TECHNOLOGY S.A." tiene también razón social/RFC
      registrada en México (para el footer legal y facturación electrónica
      CFDI), o si toda la facturación en México se hace bajo otra entidad legal
      mexicana asociada.
- [ ] Proveer el logo actualizado con el naming "NG Intelligence Group"
      (mencionas que está en proceso — no bloquea el Sprint 1, sí bloquea
      el Sprint 2 de Component Builder/Hero).

---

## 2. CONFIGURACIÓN EN cPanel (antes del primer despliegue)

- [x] PHP 8.2 confirmado como versión objetivo. **Atención:** mencionas que el
      selector de PHP en tu cPanel llega hasta 8.5 — verifica en "MultiPHP
      Manager" que el dominio esté fijado explícitamente en **8.2.x o 8.3.x**,
      no en la versión más nueva disponible por defecto. Laravel 12 soporta
      8.2+, pero muchos paquetes de Composer (sobre todo de terceros para
      YouTube/GA4) aún no garantizan compatibilidad con 8.4/8.5. Antigravity
      debe validar esto en el Sprint 1 antes de correr `composer install`.
- [x] Terminal habilitada — Antigravity puede ejecutar Composer/Artisan directo.
- [x] SSL (AutoSSL) activo — confirmar que fuerza HTTPS en todo el sitio.
- [x] Estructura de carpetas confirmada (con el nombre `mexico` en lugar de
      `ng_mexico_app` — esto sustituye el nombre de carpeta usado como ejemplo
      en `DEPLOYMENT_OPERATIONS_RUNBOOK.md` sección 5; la estructura interna
      del framework no cambia, solo el nombre del directorio raíz privado):
      ```
      /home/ngint380/mexico          (código privado, Laravel)
      /home/ngint380/public_html     (solo index.php, assets, robots.txt)
      /home/ngint380/backups
      /home/ngint380/logs
      ```
- [ ] Configurar el **Cron Job** del scheduler de Laravel (ruta actualizada):
      ```
      * * * * * php /home/ngint380/mexico/artisan schedule:run >> /dev/null 2>&1
      ```
- [ ] Configurar backups automáticos (diario DB, semanal archivos, mensual
      snapshot completo) — cPanel Backup Wizard o herramienta del hosting.

---

## 3. ARCHIVO `.env` (tú lo llenas directamente en el servidor)

- [ ] `DB_DATABASE=ngint380_ng2026`, `DB_USERNAME=ngint380_2026ng`, `DB_PASSWORD=` (la real, solo en el servidor)
- [ ] `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://ngintelligencegroup.com`
- [ ] Credenciales SMTP reales (proveedor de correo que uses)
- [ ] `YOUTUBE_API_KEY` real (Google Cloud Console)
- [ ] Credenciales GA4 / Google Tag Manager
- [ ] Credenciales Meta (si aplica para pixel/anuncios)

---

## 4. CUENTAS Y HERRAMIENTAS EXTERNAS

- [ ] Google Search Console — verificar propiedad del dominio
- [ ] Google Analytics 4 — crear propiedad
- [ ] Google Business Profile (si aplica presencia local/física)
- [ ] Canal de YouTube oficial confirmado (para el `platform + external_id` de videos)
- [ ] Cuentas reales de redes sociales para el campo `sameAs` del Organization schema

---

## 5. CONTENIDO REAL (nadie puede inventarlo por ti — está prohibido en los documentos maestros)

- [ ] Textos reales de las 15 verticales (ERP SICLA®, RRHH, Kommo CRM, Digital
      Card, NEXT-GATE, Facturación Electrónica, Microsoft/Google, Telemetría
      GPS, My Marchamo, Marshal IA, My Negocio .Shop, Servicios de Agencia,
      Innovate 360°, Desarrollo de Software, Formación IA)
- [ ] Logo en formatos requeridos (webp/avif/svg)
- [ ] Imágenes propias optimizadas con nombre semántico y alt text
- [ ] Testimonios y casos de éxito **reales** (prohibido inventar clientes o métricas)
- [ ] Datos de contacto reales: teléfono, dirección legal, correo comercial
- [ ] Biografía y foto de Nolan Muñoz Durán para `/nolan-munoz-duran/`
- [ ] Aviso de Privacidad (México, LFPDPPP) — documento legal, revisarlo con
      un abogado si no existe todavía
- [ ] Términos y condiciones del sitio

---

## 6. VALIDACIÓN Y APROBACIÓN (rol de Product Owner / UAT)

- [ ] Al final de cada sprint que entregue Antigravity, revisar contra el
      checklist de `TESTING_QA_MASTER_PLAN.md` (Sección 29, UAT) antes de aprobar.
- [ ] Verificar que ningún sprint publique contenido de ejemplo/placeholder
      como si fuera real.
- [ ] Aprobar explícitamente cada sprint antes de que Antigravity avance al
      siguiente (el prompt maestro se lo exige, pero la aprobación final es tuya).
- [ ] Ejecutar el Go-Live Checklist de `DEPLOYMENT_OPERATIONS_RUNBOOK.md`
      (Sección 32) antes de anunciar el sitio como público.

---

## 7. LO QUE NO TIENES QUE HACER

- Escribir código, migraciones o tests (eso es 100% de Antigravity, guiado
  por el prompt maestro).
- Diseñar el esquema de base de datos o la arquitectura (ya está resuelto en
  `schema.sql` y los documentos maestros).
- Redactar el JSON-LD o las reglas de `robots.txt` (ya están en
  `PROMPT_PARA_ANTIGRAVITY.md`).

---

document: TAREAS_DEL_USUARIO.md
version: 1.0
generado_por: Claude (Orquestador)
