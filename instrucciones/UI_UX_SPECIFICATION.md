# UI_UX_SPECIFICATION_V2.md

# NG TECHNOLOGY MÉXICO
## Especificación final de interfaz y experiencia de usuario

**Versión:** 2.0 Final  
**Estado:** Línea base aprobada de UI/UX  
**Documento rector:** `PROJECT_MANIFEST.md` v2.0  
**Arquitectura relacionada:** `SYSTEM_ARCHITECTURE_V2.md`  
**Datos relacionados:** `DATABASE_SPECIFICATION_V2.md`  
**Mercado inicial:** México  
**Idioma principal:** Español de México (`es-MX`)  
**Zona horaria:** `America/Mexico_City`  
**Moneda:** MXN  

---

# 1. PROPÓSITO

Este documento define la experiencia de usuario, la arquitectura de información, el sistema visual, los componentes, los patrones de interacción y los criterios de aceptación para el portal de NG TECHNOLOGY México.

Debe ser utilizado por:

- Diseño de producto.
- Diseño UI/UX.
- Desarrollo frontend.
- Desarrollo backend responsable del CMS.
- Especialistas de contenido y SEO.
- QA funcional y de accesibilidad.
- La inteligencia artificial encargada de generar el sistema.

En caso de contradicción, prevalece `PROJECT_MANIFEST.md`.

---

# 2. INSTRUCCIONES PARA LA IA DE DESARROLLO

La IA debe tratar esta especificación como un contrato verificable.

## 2.1 Reglas obligatorias

1. Diseñar primero para móvil.
2. Usar renderizado Blade en servidor.
3. Utilizar componentes reutilizables.
4. No crear una SPA.
5. No introducir React, Angular o Vue.
6. Utilizar Alpine.js únicamente para interacciones progresivas.
7. Utilizar animaciones CSS e Intersection Observer como base.
8. Cargar GSAP solo cuando una animación aprobada lo justifique.
9. Respetar `prefers-reduced-motion`.
10. Mantener el objetivo WCAG 2.2 AA.
11. Mantener visibles los estados de foco.
12. No ocultar información esencial detrás de animaciones.
13. No inventar testimonios, logos de clientes, cifras, precios, certificaciones o reconocimientos.
14. No inventar datos corporativos ni de contacto.
15. Marcar los contenidos pendientes con `TODO: REQUIERE CONTENIDO APROBADO`.
16. No crear un editor visual libre dentro del CMS.
17. Implementar el CMS como constructor de secciones predefinidas.
18. Mantener las 15 verticales comerciales y la sección de marca personal/YouTube.
19. Mantener la jerarquía oficial de CTA.
20. No sacrificar rendimiento por efectos visuales.

## 2.2 Entrega esperada por pantalla

Para cada pantalla o componente, la IA debe proporcionar:

```text
1. Objetivo de la pantalla
2. Usuario principal
3. Estructura semántica
4. Componentes utilizados
5. Estados y validaciones
6. Comportamiento responsive
7. Requisitos de accesibilidad
8. Eventos de analítica
9. Contenido pendiente de validación
10. Pruebas manuales y automatizadas aplicables
```

---

# 3. VISIÓN DE EXPERIENCIA

La plataforma debe presentar a NG TECHNOLOGY como una empresa tecnológica sólida, experimentada y orientada a resultados empresariales.

La experiencia debe transmitir:

```text
Confianza
Claridad
Capacidad técnica
Innovación aplicable
Acompañamiento
Escalabilidad
Orientación a negocio
```

La plataforma debe permitir que una persona visitante comprenda rápidamente:

1. Qué hace NG TECHNOLOGY.
2. Qué problemas empresariales resuelve.
3. Qué soluciones ofrece.
4. Para qué tipo de organización resulta relevante.
5. Cuál es el siguiente paso recomendado.
6. Cómo contactar o solicitar una demostración.

El portal debe funcionar como plataforma comercial, editorial y de generación de oportunidades, no como un folleto digital estático.

---

# 4. OBJETIVOS DE UI/UX

## 4.1 Objetivos primarios

- Facilitar el descubrimiento de soluciones.
- Reducir fricción para contactar.
- Generar solicitudes de demostración.
- Capturar leads con contexto suficiente.
- Conectar recursos y videos con soluciones.
- Construir confianza mediante información clara y verificable.
- Mantener una experiencia consistente entre las 15 verticales.
- Integrar la marca personal sin confundirla con la identidad corporativa.

## 4.2 Objetivos secundarios

- Mejorar la comprensión del portafolio.
- Facilitar la navegación por industria, necesidad o solución.
- Permitir lectura rápida y lectura profunda.
- Facilitar publicación desde el CMS.
- Mantener indexabilidad y semántica.
- Permitir expansión futura sin rediseñar el sistema visual.

---

# 5. PRINCIPIOS DE DISEÑO

## 5.1 Mobile First

La interfaz debe diseñarse y validarse primero a partir de 320 px de ancho.

## 5.2 Conversion First

Toda página comercial debe tener un siguiente paso claro y medible.

## 5.3 Progressive Disclosure

La información más relevante debe aparecer primero. Los detalles técnicos extensos pueden presentarse mediante secciones, pestañas accesibles o acordeones.

## 5.4 Content First

La estructura debe adaptarse al contenido aprobado. El diseño no debe obligar a inventar texto para llenar espacios.

## 5.5 Performance First

No se deben utilizar recursos visuales o interacciones que comprometan los objetivos de rendimiento.

## 5.6 Accessibility by Default

Los componentes deben construirse accesibles desde su primera versión.

## 5.7 Consistency over Novelty

Un mismo patrón debe comportarse igual en todas las páginas.

## 5.8 Trust by Evidence

Las afirmaciones deben apoyarse en información autorizada. No se utilizarán métricas, insignias ni pruebas sociales inventadas.

---

# 6. PERFILES DE USUARIO

## 6.1 Dirección general

### Objetivos

- Comprender el impacto empresarial.
- Evaluar beneficios y riesgos.
- Identificar una ruta de transformación.
- Contactar con una persona asesora.

### Información prioritaria

- Resultados de negocio.
- Visión integral.
- Casos de uso.
- Proceso de implementación.
- Siguiente paso.

## 6.2 Dirección de tecnología

### Objetivos

- Entender arquitectura, seguridad e integración.
- Evaluar compatibilidad.
- Identificar alcance técnico.
- Solicitar una evaluación.

### Información prioritaria

- Integraciones.
- Requisitos.
- Seguridad.
- Escalabilidad.
- Soporte.

## 6.3 Dirección comercial

### Objetivos

- Mejorar seguimiento y conversión.
- Automatizar procesos comerciales.
- Evaluar CRM y analítica.

### Información prioritaria

- Flujo comercial.
- Automatización.
- Métricas.
- Casos de uso.
- Demostración.

## 6.4 Operaciones y administración

### Objetivos

- Mejorar control.
- Reducir tareas manuales.
- Integrar procesos.
- Evaluar ERP, RRHH, acceso, telemetría o facturación.

## 6.5 PyMEs y emprendimientos

### Objetivos

- Digitalizar operaciones.
- Vender en línea.
- Implementar automatización de forma progresiva.
- Recibir capacitación.

## 6.6 Audiencia educativa

### Objetivos

- Aprender sobre IA aplicada.
- Consultar contenidos y videos.
- Descargar recursos.
- Conocer cursos y talleres.

---

# 7. ARQUITECTURA DE INFORMACIÓN

## 7.1 Mapa principal

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

## 7.2 Navegación principal

```text
Inicio
Soluciones
Recursos
Casos de éxito
Videos
Nosotros
Contacto
```

CTA del encabezado:

```text
Solicitar demostración
```

## 7.3 Mega menú de soluciones

El mega menú debe agrupar las soluciones mediante categorías administrables:

```text
Software empresarial
Cloud y productividad
Inteligencia artificial
IoT y control
Comercio electrónico
Servicios profesionales
Consultoría
Formación
```

En móvil, el mismo contenido debe presentarse mediante un acordeón accesible, no mediante un mega menú horizontal comprimido.

## 7.4 Breadcrumbs

Todas las páginas internas indexables deben mostrar breadcrumbs visibles y semánticos.

Ejemplo:

```text
Inicio > Soluciones > ERP SICLA®
```

---

# 8. JERARQUÍA DE CONVERSIÓN

## 8.1 CTA principal

```text
Solicitar demostración
```

## 8.2 CTA secundario

```text
Hablar con un asesor
```

## 8.3 CTA terciario

```text
Realizar diagnóstico de IA
```

## 8.4 Reglas de CTA

- Una sección no debe presentar más de un CTA primario.
- Los textos deben describir la acción.
- Evitar etiquetas ambiguas como “Más información” cuando exista una acción específica.
- El CTA principal debe aparecer en el hero de las páginas comerciales.
- Debe repetirse después de información suficiente para justificar la acción.
- No utilizar ventanas emergentes inmediatas.
- No bloquear contenido para forzar interacción.
- Registrar el nombre del CTA y la vertical en analítica.

---

# 9. SISTEMA VISUAL

## 9.1 Dirección visual

```text
Tecnología empresarial
Moderno
Claro
Modular
Profesional
Humano
Orientado a datos
```

La estética no debe parecer:

```text
Plantilla genérica de agencia
Interfaz de videojuego
Sitio experimental con animación excesiva
Marketplace de consumo masivo
Portal gubernamental
```

## 9.2 Tokens de color iniciales

Los valores siguientes son una línea base técnica y deben sustituirse si existe un manual de marca aprobado.

```yaml
color.brand.900: "#001B3A"
color.brand.800: "#003366"
color.brand.700: "#0055A4"
color.accent.600: "#008080"
color.accent.500: "#00A6A6"
color.action.600: "#E55C00"
color.action.500: "#FF6B00"
color.success.600: "#1F7A3D"
color.warning.500: "#D99A00"
color.danger.600: "#C62828"
color.info.600: "#147A9C"
color.neutral.950: "#0B1220"
color.neutral.900: "#111827"
color.neutral.700: "#374151"
color.neutral.600: "#4B5563"
color.neutral.500: "#6B7280"
color.neutral.300: "#D1D5DB"
color.neutral.200: "#E5E7EB"
color.neutral.100: "#F3F4F6"
color.neutral.50: "#F9FAFB"
color.white: "#FFFFFF"
```

## 9.3 Reglas de color

- El color de acción se reserva para CTA y estados destacados.
- No usar color como único indicador de estado.
- Verificar contraste AA antes de aprobar combinaciones.
- Los fondos oscuros deben tener versiones visibles de enlaces, controles y foco.
- Los estados de error, advertencia y éxito deben incluir icono o texto.

## 9.4 Tipografía

Fuente preferida, sujeta a aprobación de marca:

```yaml
primary: Inter
fallback: Arial, Helvetica, sans-serif
```

Debe alojarse localmente cuando la licencia lo permita.

Escala fluida sugerida:

```css
:root {
  --font-size-xs: 0.75rem;
  --font-size-sm: 0.875rem;
  --font-size-base: 1rem;
  --font-size-lg: 1.125rem;
  --font-size-xl: 1.25rem;
  --font-size-2xl: clamp(1.5rem, 2vw, 1.875rem);
  --font-size-3xl: clamp(1.875rem, 3vw, 2.5rem);
  --font-size-4xl: clamp(2.25rem, 5vw, 3.5rem);
}
```

Reglas:

- Texto base mínimo de 16 px en móvil.
- Longitud de línea recomendada entre 45 y 80 caracteres.
- Interlineado de cuerpo entre 1.5 y 1.75.
- No utilizar texto justificado.
- No utilizar más pesos tipográficos de los necesarios.

## 9.5 Espaciado

```yaml
space.1: 4px
space.2: 8px
space.3: 12px
space.4: 16px
space.5: 20px
space.6: 24px
space.8: 32px
space.10: 40px
space.12: 48px
space.16: 64px
space.20: 80px
space.24: 96px
```

## 9.6 Bordes y radios

```yaml
radius.sm: 6px
radius.md: 10px
radius.lg: 16px
radius.xl: 24px
radius.pill: 9999px
border.default: 1px
```

## 9.7 Sombras

Las sombras deben ser discretas. No se utilizarán como único mecanismo de separación.

```yaml
shadow.sm: "0 1px 2px rgb(15 23 42 / 0.06)"
shadow.md: "0 8px 24px rgb(15 23 42 / 0.10)"
shadow.lg: "0 16px 40px rgb(15 23 42 / 0.12)"
```

---

# 10. GRID Y RESPONSIVE

## 10.1 Breakpoints

```yaml
xs: 320px
sm: 640px
md: 768px
lg: 1024px
xl: 1280px
2xl: 1536px
```

## 10.2 Contenedor

```css
.page-container {
  width: min(100% - 2rem, 80rem);
  margin-inline: auto;
}
```

En pantallas estrechas se debe conservar un mínimo de 16 px por lado.

## 10.3 Reglas responsive

### Móvil

- Una columna por defecto.
- CTA principal visible sin cubrir contenido.
- Menú de navegación mediante diálogo o panel accesible.
- Formularios en una columna.
- Tablas complejas con alternativa legible.
- Objetivos táctiles de al menos 44 x 44 px.

### Tableta

- Dos columnas cuando el contenido lo permita.
- Navegación adaptada según espacio real.
- Formularios divididos solo si mejora la comprensión.

### Escritorio

- Máximo de cuatro columnas para tarjetas comerciales.
- Mega menú organizado por categorías.
- Anchuras de lectura controladas.
- No extender párrafos a todo el ancho disponible.

---

# 11. COMPONENTES GLOBALES

## 11.1 Encabezado

Debe incluir:

- Logo enlazado al inicio.
- Navegación principal.
- CTA principal.
- Selector de idioma solo cuando existan otros idiomas.
- Menú móvil accesible.

Comportamiento:

- Puede adoptar estado compacto al desplazarse.
- No debe cambiar de tamaño de forma que genere CLS.
- Debe conservar navegación por teclado.
- Debe cerrar el menú con `Escape`.
- Debe devolver el foco al activador al cerrarse.

## 11.2 Pie de página

Debe incluir:

- Identidad corporativa.
- Navegación secundaria.
- Enlaces a soluciones.
- Recursos.
- Contacto validado.
- Enlaces legales.
- Redes oficiales.
- Fecha de copyright dinámica.

No deben mostrarse direcciones, teléfonos o perfiles no confirmados.

## 11.3 Botones

Variantes:

```text
Primario
Secundario
Terciario
Discreto
Peligro administrativo
```

Estados:

```text
Normal
Hover
Focus-visible
Active
Loading
Disabled
```

Reglas:

- No sustituir botones por enlaces cuando la acción modifica datos.
- No sustituir enlaces por botones cuando la acción navega.
- El estado de carga debe impedir dobles envíos.
- El texto no debe desaparecer sin anunciar el estado.

## 11.4 Tarjetas

Variantes:

```text
Solución
Artículo
Recurso
Video
Caso de éxito
Estadística
CTA
```

Deben mantener:

- Área clicable clara.
- Encabezado semántico.
- Imagen con dimensiones.
- Foco visible.
- Metadatos solo cuando aportan contexto.

## 11.5 Acordeón

Usos:

- FAQ.
- Mega menú móvil.
- Detalles secundarios.

Requisitos:

- Botón real.
- `aria-expanded`.
- `aria-controls`.
- Navegación mediante teclado.
- Contenido disponible sin depender de animación.

## 11.6 Pestañas

Se utilizarán solo cuando los paneles representen perspectivas equivalentes. En móvil podrán convertirse en acordeón si se preserva el contexto.

## 11.7 Modal y diálogo

Usos permitidos:

- Confirmaciones administrativas.
- Vista ampliada de medios.
- Información breve contextual.

No usar para:

- Mostrar contenido principal.
- Solicitar suscripción al entrar.
- Ocultar información legal esencial.

Requisitos:

- Gestión de foco.
- Cierre con `Escape`.
- Etiqueta accesible.
- Bloqueo correcto del contenido de fondo.

---

# 12. PÁGINA DE INICIO

## 12.1 Objetivo

Comunicar la propuesta de NG TECHNOLOGY, facilitar el descubrimiento del portafolio y dirigir a una conversión relevante.

## 12.2 Estructura

```text
1. Hero
2. Prueba de experiencia autorizada
3. Categorías de solución
4. Soluciones destacadas
5. Problemas empresariales que se resuelven
6. Sectores o casos de uso
7. Proceso de trabajo
8. Contenidos o videos destacados
9. Marca personal y educación en IA
10. CTA final
```

## 12.3 Hero

Debe incluir:

- H1 único.
- Propuesta de valor.
- Texto de apoyo.
- CTA principal.
- CTA secundario.
- Visual optimizado y relevante.

No debe incluir:

- Carrusel automático.
- Video pesado automático en móvil.
- Varias ofertas competidoras.
- Métricas inventadas.

## 12.4 Soluciones destacadas

El CMS debe permitir seleccionar qué soluciones aparecen destacadas sin alterar el catálogo completo.

## 12.5 Prueba social

Solo se mostrará cuando exista autorización y evidencia. Los espacios sin información aprobada deben omitirse, no rellenarse con texto ficticio.

---

# 13. CATÁLOGO DE SOLUCIONES

## 13.1 Objetivo

Permitir explorar las 15 verticales por categoría, necesidad o búsqueda.

## 13.2 Funciones

- Filtro por categoría.
- Búsqueda por texto.
- Tarjetas consistentes.
- Estado vacío útil.
- URL indexable del catálogo.

Los filtros no necesitan generar URLs indexables en V1.

## 13.3 Contenido de tarjeta

```text
Nombre
Categoría
Resumen breve
Beneficio o problema principal
CTA de navegación
```

No mostrar precios si no han sido aprobados.

---

# 14. LANDING PAGE DE SOLUCIÓN

## 14.1 Plantilla oficial

```text
1. Breadcrumbs
2. Hero
3. Problema o necesidad
4. Propuesta de valor
5. Beneficios
6. Funcionalidades o alcance
7. Casos de uso
8. Sectores aplicables
9. Proceso de diagnóstico o implementación
10. Recursos relacionados
11. Video relacionado
12. FAQ
13. CTA
14. Formulario
15. Soluciones relacionadas
```

El CMS podrá desactivar secciones no aplicables, pero no cambiar libremente la semántica del componente.

## 14.2 Hero de solución

Debe incluir:

- Nombre de la solución.
- Resultado principal en lenguaje empresarial.
- Resumen.
- CTA principal de la vertical.
- CTA secundario.
- Recurso visual autorizado.

## 14.3 Beneficios

Cada beneficio debe responder:

```text
Qué mejora
Para quién
Por qué importa
```

## 14.4 Funcionalidades

Deben diferenciarse de los beneficios. Las funcionalidades describen capacidades; los beneficios describen resultados esperados.

## 14.5 Facturación Electrónica

Cualquier contenido relacionado con SAT, CFDI, PAC o cumplimiento mexicano debe requerir estado editorial aprobado antes de publicarse.

## 14.6 CTA por vertical

El CMS debe almacenar el CTA principal de cada vertical. La interfaz no debe usar la misma acción de forma automática cuando el servicio requiera diagnóstico, assessment, brief o levantamiento técnico.

---

# 15. CENTRO DE RECURSOS

## 15.1 Estructura

```text
Recursos
├── Artículos
├── Videos
├── Casos de éxito
├── Webinars
└── Descargables
```

## 15.2 Página de recursos

Debe incluir:

- Contenido destacado.
- Filtros por tipo.
- Filtros por tema o vertical.
- Buscador.
- Paginación.
- Estado vacío.

## 15.3 Artículo

Estructura:

```text
Breadcrumbs
Título
Resumen
Autor o entidad responsable
Fecha de publicación
Fecha de revisión cuando aplique
Imagen principal
Tabla de contenidos para textos extensos
Cuerpo semántico
Recursos o fuentes propias
CTA contextual
FAQ opcional
Contenido relacionado
```

## 15.4 Recurso descargable

Debe informar:

- Tipo de archivo.
- Descripción.
- Tamaño cuando esté disponible.
- Si requiere formulario.
- Tratamiento de datos aplicable.

---

# 16. CASOS DE ÉXITO

## 16.1 Estructura

```text
Contexto
Problema
Enfoque
Solución aplicada
Resultado autorizado
Tecnologías
Verticales relacionadas
CTA
```

## 16.2 Reglas

- No publicar logotipos sin autorización.
- No publicar cifras no verificadas.
- Permitir anonimización cuando corresponda.
- Identificar claramente resultados cualitativos y cuantitativos.

---

# 17. MARCA PERSONAL Y YOUTUBE

## 17.1 Arquitectura de marca

La marca personal se integra dentro del sitio principal, pero debe mantener una identidad secundaria compatible con NG TECHNOLOGY.

No debe competir con la navegación corporativa ni confundir quién presta los servicios.

## 17.2 Página de Nolan Muñoz Durán

Estructura:

```text
Hero de perfil
Áreas temáticas
Propuesta educativa
Videos destacados
Artículos destacados
Recursos
Participación o experiencia autorizada
CTA a diagnóstico, formación o contacto
```

## 17.3 Biblioteca de videos

Funciones:

- Listado paginado.
- Filtro por tema o playlist cuando exista información sincronizada.
- Búsqueda por texto.
- Tarjeta ligera.
- Reproducción posterior a interacción.
- Enlace al video original.
- Landing o solución relacionada.

## 17.4 Tarjeta de video

Debe incluir:

```text
Miniatura
Duración, si está disponible
Título
Fecha, si aporta contexto
Tema o vertical
CTA para ver contenido
```

## 17.5 Reproducción ligera

La miniatura se carga primero. El iframe se crea después del clic. Debe usarse el dominio de privacidad mejorada cuando sea compatible con la política aprobada.

---

# 18. FORMULARIOS PÚBLICOS

## 18.1 Formularios oficiales

```text
Contacto general
Solicitud de demostración
Solicitud de asesoría
Solicitud de cotización
Diagnóstico de IA
Descarga de recurso
Suscripción a contenidos
```

## 18.2 Diseño

- Una columna en móvil.
- Etiquetas persistentes, no solo placeholders.
- Campos agrupados por tema.
- Texto de ayuda cuando sea necesario.
- Campos opcionales identificados.
- Resumen de errores al inicio.
- Error junto al campo.
- Botón con estado de carga.
- Confirmación clara de envío.

## 18.3 Datos

Los campos deben adaptarse al formulario. No solicitar todos los datos en todos los casos.

## 18.4 Validación

- Cliente para retroalimentación inmediata.
- Servidor como fuente de verdad.
- Correo normalizado.
- Teléfono compatible con `+52` y otros formatos permitidos por negocio.
- Consentimiento independiente cuando corresponda.
- Prevención de doble envío.
- Protección antispam sin CAPTCHA invasivo como primera opción.

## 18.5 Estado exitoso

Debe indicar:

- Que la solicitud fue recibida.
- Próximo paso aprobado por negocio.
- Número de referencia si se implementa.
- Enlaces útiles relacionados.

No prometer tiempos de respuesta si no existe un SLA aprobado.

## 18.6 Estado de error

Debe:

- Conservar los datos no sensibles introducidos.
- Explicar qué debe corregirse.
- Proporcionar una alternativa de contacto solo si está validada.
- No mostrar información interna del servidor.

---

# 19. DIAGNÓSTICO DE IA

## 19.1 Objetivo

Capturar contexto sobre madurez digital y oportunidades de automatización sin presentar el resultado como evaluación definitiva.

## 19.2 Flujo sugerido

```text
Introducción
↓
Datos de empresa
↓
Procesos y herramientas
↓
Desafíos
↓
Objetivos
↓
Datos de contacto y consentimiento
↓
Confirmación
```

## 19.3 Reglas

- Mostrar progreso.
- Permitir volver sin perder datos no sensibles.
- No utilizar puntuaciones engañosas.
- No generar recomendaciones regulatorias automáticas.
- Informar que el resultado es orientativo si se genera una síntesis.
- Mantener el diagnóstico dentro del alcance de captación, no como sistema de consultoría autónoma.

---

# 20. BÚSQUEDA

## 20.1 Alcance

La búsqueda debe cubrir:

```text
Soluciones
Artículos
Recursos
Casos de éxito
Videos
```

## 20.2 Experiencia

- Campo claramente etiquetado.
- Resultados agrupados por tipo.
- Coincidencias visibles.
- Estado sin resultados con sugerencias.
- Paginación.
- Consultas escapadas y validadas.

Los resultados internos deben configurarse según la política SEO para evitar páginas delgadas o duplicadas.

---

# 21. POLÍTICA DE MICROINTERACCIONES

## 21.1 Permitidas

```text
Fade corto
Slide vertical corto
Cambio de elevación
Cambio de borde
Apertura de acordeón
Indicador de progreso
Skeleton limitado
Contador cuando esté justificado
Confirmación de acción
```

## 21.2 No permitidas

```text
Parallax pesado
Scroll secuestrado
Cursores personalizados
Video automático con sonido
Carruseles automáticos rápidos
Animaciones que retrasen contenido
Transiciones completas entre páginas
Elementos flotantes que tapen contenido
```

## 21.3 Duraciones

```yaml
instant: 80ms
fast: 150ms
normal: 220ms
slow: 400ms
maximum_standard: 500ms
```

## 21.4 Movimiento reducido

```css
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    scroll-behavior: auto !important;
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

---

# 22. ACCESIBILIDAD

## 22.1 Objetivo

```yaml
standard: WCAG 2.2 AA
```

## 22.2 Requisitos generales

- HTML semántico.
- Un H1 por página.
- Jerarquía de encabezados coherente.
- Navegación completa por teclado.
- Foco visible.
- Skip link.
- Contraste AA.
- Alternativas textuales.
- Etiquetas de formulario.
- Errores accesibles.
- No depender solo del color.
- Zoom al 200% sin pérdida funcional.
- Reflow a 320 CSS px.
- Subtítulos o transcripciones para contenido audiovisual cuando estén disponibles.
- Objetivos táctiles adecuados.
- Respeto de preferencias de movimiento.

## 22.3 Componentes complejos

Los menús, acordeones, pestañas, diálogos y notificaciones deben seguir patrones ARIA reconocidos sin añadir roles redundantes.

## 22.4 Contenido

- Lenguaje claro.
- Enlaces descriptivos.
- Abreviaturas explicadas.
- Tablas con encabezados.
- Instrucciones no basadas solo en posición o color.

---

# 23. RENDIMIENTO Y EXPERIENCIA PERCIBIDA

## 23.1 Objetivos

```yaml
mobile_lighthouse_target: 90 or higher
lcp_target: less than 2.5 seconds
cls_target: less than 0.1
inp_target: less than 200 milliseconds
```

## 23.2 Reglas visuales

- Reservar espacio para imágenes y componentes asíncronos.
- No insertar banners sobre contenido tras la carga.
- Imágenes hero con `fetchpriority="high"` cuando corresponda.
- Lazy loading para contenido fuera del viewport.
- Imágenes responsivas mediante `srcset` y `sizes`.
- AVIF o WebP con fallback cuando sea necesario.
- No cargar iframes de video en el render inicial.
- Minimizar scripts de terceros.
- Evitar fuentes externas bloqueantes.
- No utilizar carruseles si una cuadrícula resulta suficiente.

## 23.3 Estados de carga

- Priorizar renderizado de contenido disponible.
- Usar skeleton solo cuando evite saltos y exista espera real.
- No ocultar toda la página detrás de un spinner.

---

# 24. SEO Y GEO EN LA INTERFAZ

## 24.1 Requisitos visibles

- Breadcrumbs.
- Autor o responsable cuando aplique.
- Fecha de publicación y revisión.
- Preguntas y respuestas visibles si existe `FAQPage`.
- Datos corporativos consistentes.
- Encabezados descriptivos.
- Enlaces internos contextuales.
- Contenido relacionado.

## 24.2 Citabilidad

Los contenidos educativos deben incluir:

- Resumen inicial.
- Definiciones claras.
- Pasos o criterios cuando corresponda.
- Secciones de preguntas frecuentes.
- Fecha de revisión.
- Entidad responsable.
- Fuentes propias verificables cuando existan.

## 24.3 Reglas

No crear bloques de texto ocultos exclusivamente para motores de búsqueda o modelos de IA.

Los datos estructurados deben representar contenido visible.

---

# 25. LOCALIZACIÓN PARA MÉXICO

## 25.1 Configuración

```yaml
language: es-MX
timezone: America/Mexico_City
currency: MXN
visible_date: DD/MM/AAAA
technical_date: ISO-8601
phone_country_code: +52
```

## 25.2 Terminología preferida

```text
Solicitar demostración
Hablar con un asesor
Solicitar cotización
Solución empresarial
Automatización de procesos
Transformación digital
Inteligencia artificial aplicada
```

## 25.3 Reglas editoriales

- Evitar regionalismos de Costa Rica en contenido dirigido a México.
- No usar “Hacienda 4.4” en contenido mexicano.
- No afirmar compatibilidad con CFDI o PAC sin aprobación.
- Mostrar MXN de manera explícita cuando existan importes.
- Mostrar estado y municipio como campos separados cuando sean necesarios.
- No asumir cobertura nacional si no está aprobada.

---

# 26. PANEL ADMINISTRATIVO

## 26.1 Principios

```text
Claro
Predecible
Auditable
Basado en permisos
Eficiente para tareas frecuentes
```

## 26.2 Navegación

```text
Dashboard
Contenidos
├── Páginas
├── Soluciones
├── Artículos
├── Recursos
├── Casos de éxito
├── Videos
└── FAQ
Apariencia
├── Banners
├── Menús
└── Medios
Conversión
├── Formularios
└── Leads
SEO
├── Metadata
├── Redirecciones
├── Sitemap
└── Rastreadores
Administración
├── Usuarios
├── Roles y permisos
├── Integraciones
├── Configuración
└── Auditoría
```

## 26.3 Dashboard

Widgets permitidos según datos y permisos:

- Leads recientes.
- Leads por estado.
- Contenidos pendientes de revisión.
- Publicaciones programadas.
- Estado de sincronización de YouTube.
- Actividad administrativa.
- Estado del sitemap.

No inventar indicadores que no existan en la base de datos.

## 26.4 Patrón de listados

Cada listado debe admitir, cuando corresponda:

- Búsqueda.
- Filtros.
- Ordenación.
- Paginación.
- Selección limitada de acciones masivas.
- Estado vacío.
- Acciones según permiso.

## 26.5 Formularios administrativos

- Agrupar campos en secciones.
- Guardar borrador.
- Mostrar errores sin perder contenido.
- Advertir antes de salir con cambios no guardados.
- Requerir confirmación para acciones destructivas.
- No permitir edición de credenciales en texto visible.

## 26.6 Constructor por componentes

El editor debe permitir:

```text
Añadir una sección aprobada
Configurar sus campos
Reordenar secciones
Activar o desactivar
Duplicar sección
Previsualizar
Guardar borrador
Enviar a revisión
Publicar según permisos
```

No debe permitir:

```text
Insertar PHP
Insertar JavaScript arbitrario
Editar plantillas Blade
Crear HTML sin sanitizar
Posicionamiento absoluto libre
Instalar plugins
```

## 26.7 Estados editoriales

```text
Borrador
En revisión
Aprobado
Programado
Publicado
Archivado
```

Cada cambio de estado debe mostrar únicamente las acciones permitidas al rol.

## 26.8 Leads

La vista de lead debe mostrar:

- Datos proporcionados.
- Consentimiento.
- Formulario.
- Página y vertical de origen.
- UTM disponibles.
- Estado.
- Responsable.
- Historial.
- Notas autorizadas.

Las acciones de exportación deben requerir permiso explícito.

---

# 27. ESTADOS DE INTERFAZ

Todo componente de datos debe definir:

```text
Loading
Empty
Error
Success
Partial data
Permission denied
```

## 27.1 Estado vacío

Debe explicar:

- Qué falta.
- Por qué puede estar vacío.
- Acción disponible, si el rol la permite.

## 27.2 Estado de error

Debe evitar códigos técnicos y no revelar rutas, stack traces o credenciales.

## 27.3 Notificaciones

- Confirmaciones breves mediante toast accesible.
- Errores persistentes cerca del contexto.
- Acciones críticas mediante alerta o diálogo.
- No usar toast como único lugar para detalles importantes.

---

# 28. ANALÍTICA DE EXPERIENCIA

## 28.1 Eventos públicos

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
filter_results
```

## 28.2 Parámetros

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

## 28.3 Reglas

- No enviar datos personales a analítica.
- Evitar eventos duplicados.
- Respetar consentimiento.
- Documentar nombres y parámetros.
- Probar los eventos antes de producción.

---

# 29. CONTENIDOS PENDIENTES Y PLACEHOLDERS

La IA debe usar los siguientes marcadores cuando falte información:

```text
TODO: REQUIERE CONTENIDO APROBADO
TODO: REQUIERE VALIDACIÓN COMERCIAL
TODO: REQUIERE VALIDACIÓN LEGAL MÉXICO
TODO: REQUIERE ACTIVO DE MARCA
TODO: REQUIERE URL O CREDENCIAL
TODO: REQUIERE TESTIMONIO AUTORIZADO
TODO: REQUIERE CASO DE ÉXITO AUTORIZADO
```

No debe utilizar texto lorem ipsum en entregables funcionales finales.

---

# 30. COMPONENTES CMS AUTORIZADOS

| Componente | Uso | Campos mínimos |
|---|---|---|
| Hero | Encabezado principal | Título, texto, CTA, imagen |
| Rich text | Contenido editorial | Encabezado, cuerpo sanitizado |
| Benefits | Resultados esperados | Título, elementos, iconos opcionales |
| Features | Capacidades | Título, descripción, elementos |
| Stats | Datos autorizados | Valor, unidad, contexto, fuente interna |
| Process | Pasos | Título, pasos ordenados |
| Industries | Sectores | Título, tarjetas o enlaces |
| Image text | Narrativa visual | Imagen, alt, contenido, alineación |
| Video | Contenido audiovisual | Video, título, descripción |
| Testimonial | Prueba social autorizada | Cita, atribución, permiso |
| Case studies | Casos relacionados | Selección de contenidos |
| FAQ | Preguntas visibles | Pregunta, respuesta |
| CTA | Conversión | Título, texto, acción |
| Form | Captura | Formulario asociado, contexto |
| Resources | Contenido relacionado | Selección o regla |
| Related content | Navegación contextual | Tipo, selección o taxonomía |

Cada componente debe contar con validación de esquema y una vista Blade dedicada.

---

# 31. PATRONES DE ERROR Y CONFIRMACIÓN

## 31.1 Eliminación

- Requerir confirmación.
- Nombrar el elemento afectado.
- Explicar el impacto.
- Utilizar soft delete cuando el modelo lo contemple.
- Registrar la acción.

## 31.2 Publicación

- Mostrar estado actual y siguiente.
- Señalar campos obligatorios pendientes.
- Advertir si la página está marcada `noindex`.
- Limpiar caché tras publicar.

## 31.3 Credenciales

- Nunca mostrar el valor completo.
- Requerir reautenticación para cambiar.
- Mostrar últimos cuatro caracteres cuando proceda.
- Registrar rotación sin incluir el secreto.

---

# 32. PRUEBAS DE UI/UX

## 32.1 Viewports mínimos

```text
320 x 568
360 x 800
390 x 844
768 x 1024
1024 x 768
1280 x 800
1440 x 900
```

## 32.2 Navegadores

```text
Versiones estables actuales de Chrome, Edge, Firefox y Safari
```

## 32.3 Pruebas manuales

- Navegación por teclado.
- Foco en menú y diálogos.
- Reflow a 320 px.
- Zoom al 200%.
- Contraste.
- Formularios con errores.
- Formularios con conexión lenta.
- Menú móvil.
- Mega menú.
- Acordeones.
- Videos sin API disponible.
- Imágenes ausentes.
- Textos largos.
- Fechas y moneda.
- Estado sin resultados.
- Permisos administrativos.

## 32.4 Pruebas automatizadas sugeridas

- Componentes Blade renderizan sin errores.
- Enlaces principales existen.
- Formularios tienen etiquetas.
- Imágenes requieren `alt` o alternativa marcada decorativa.
- Solo existe un H1.
- Diálogos exponen nombre accesible.
- Acciones administrativas respetan permisos.
- Publicación genera rutas y metadata esperadas.

---

# 33. CRITERIOS DE ACEPTACIÓN

La especificación UI/UX se considera implementada cuando:

- [ ] El sitio adopta enfoque Mobile First.
- [ ] La navegación contiene todas las áreas aprobadas.
- [ ] Las 15 verticales son accesibles desde el catálogo.
- [ ] La marca personal y YouTube están integrados sin competir con la marca corporativa.
- [ ] Cada landing admite la plantilla oficial y secciones configurables.
- [ ] La jerarquía de CTA es consistente.
- [ ] Los formularios muestran etiquetas, validación y estados accesibles.
- [ ] El diagnóstico de IA funciona como captación orientativa, no como consultoría autónoma.
- [ ] El CMS utiliza componentes predefinidos.
- [ ] El CMS no permite código arbitrario.
- [ ] Los estados editoriales son visibles y controlados por permisos.
- [ ] El panel administrativo contiene estados vacíos, errores y confirmaciones.
- [ ] La navegación por teclado funciona.
- [ ] El foco es visible.
- [ ] Los componentes cumplen el objetivo WCAG 2.2 AA.
- [ ] `prefers-reduced-motion` es respetado.
- [ ] Los iframes de YouTube no se cargan inicialmente.
- [ ] Las imágenes tienen dimensiones y alternativas textuales.
- [ ] No existen carruseles automáticos ni parallax pesado.
- [ ] Los datos estructurados corresponden a contenido visible.
- [ ] La interfaz utiliza `es-MX` y formatos definidos para México.
- [ ] No se muestran afirmaciones fiscales no aprobadas.
- [ ] No se muestran precios, métricas o testimonios inventados.
- [ ] Los eventos de analítica no incluyen datos personales.
- [ ] Las páginas representativas cumplen los objetivos de rendimiento acordados.
- [ ] No se implementaron módulos fuera de alcance.

---

# 34. DEFINITION OF DONE DE UI/UX

Una pantalla o componente está terminado cuando:

1. Tiene objetivo definido.
2. Utiliza componentes del sistema.
3. Funciona en todos los viewports mínimos.
4. Tiene estados de carga, vacío, error y éxito cuando aplican.
5. Funciona con teclado.
6. Tiene foco visible.
7. Mantiene contraste suficiente.
8. Tiene contenido real o marcadores explícitos de validación.
9. No inventa información.
10. Registra los eventos aprobados.
11. No envía datos personales a analítica.
12. No genera desplazamiento horizontal inesperado.
13. No introduce cambios de diseño acumulativos evitables.
14. Respeta movimiento reducido.
15. Tiene pruebas documentadas.
16. Cumple con `PROJECT_MANIFEST.md`.

---

# 35. ELEMENTOS FUERA DE ALCANCE

No diseñar ni implementar en V1:

```text
Marketplace
Directorio empresarial
LMS completo
Portal de clientes
Pagos
Suscripciones pagadas
Aplicación móvil nativa
Constructor visual libre
Multisitio
Selector multipaís operativo
Chatbot generativo autónomo
CRM completo
```

La iniciativa `negociosenlomas.com` pertenece al roadmap futuro y requiere un PRD separado.

---

# 36. CONTROL DE CAMBIOS DE UI/UX

Requieren aprobación explícita:

- Cambio de identidad visual.
- Cambio de arquitectura de navegación.
- Eliminación de una vertical.
- Cambio de jerarquía de CTA.
- Separación de la marca personal.
- Incorporación de pagos.
- Incorporación de un constructor visual libre.
- Uso de una nueva plataforma frontend.
- Inclusión de datos personales adicionales.
- Cambio de política de consentimiento.
- Uso de animaciones complejas.
- Cambio del estándar de accesibilidad.

Cada cambio debe registrar:

```text
ID
Fecha
Solicitante
Motivo
Pantallas afectadas
Componentes afectados
Impacto en accesibilidad
Impacto en rendimiento
Impacto en SEO
Decisión
Aprobador
```

---

# 37. CATÁLOGO VISUAL OBLIGATORIO DE VERTICALES

La navegación, el catálogo, la búsqueda y los componentes de contenidos relacionados deben contemplar explícitamente:

```text
V01  ERP SICLA®
V02  Recursos Humanos
V03  Kommo CRM
V04  Digital Card
V05  NEXT-GATE
V06  Facturación Electrónica
V07  Microsoft / Google
V08  Telemetría GPS
V09  My Marchamo
V10  Marshal IA
V11  My Negocio .Shop
V12  Servicios de Agencia
V13  Innovate 360°
V14  Desarrollo de Software
V15  Formación en Inteligencia Artificial
V16  Marca personal + YouTube
```

Las quince primeras son verticales comerciales. V16 es una sección de autoridad, contenidos y generación de oportunidades, no una solución comercial.

---

# 38. APROBACIÓN

```yaml
document: UI_UX_SPECIFICATION_V2.md
version: 2.0
status: final
source_of_truth_for_ui_ux: true
parent_document: PROJECT_MANIFEST.md
requires_change_control: true
```
