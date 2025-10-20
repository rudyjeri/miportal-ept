<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Curso (Docente) - Comprensión y Redacción de Textos II</title>

  <!-- Mantén tu style.css si lo deseas -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  
<style>
:root {
  --bg: #f9f9fb;
  --card: #fff;
  --muted: #6b7280;
  --accent: #007bff;
  --accent-2: #0f3cf4;
  --success: #16a34a;
  --border: #e5e7eb;
  --shadow: 0 6px 18px rgba(2, 6, 23, 0.04);
  --radius: 10px;
}

/* ===========================
   BASE
   =========================== */
body {
  font-family: "Segoe UI", Tahoma, sans-serif;
  background: var(--bg);
  color: #111827;
  margin: 0;
  line-height: 1.45;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.main-content {
  flex: 1;
  padding: 70px 70px 20px 100px;
}

/* ===========================
   TOPBAR / NOTICES
   =========================== */
.cv-topbar {
  background: var(--card);
  border-radius: var(--radius);
  padding: 14px;
  display: flex;
  gap: 12px;
  align-items: flex-start;
  justify-content: space-between;
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
  margin-bottom: 16px;
}

.cv-topbar-notices {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
}

.cv-notice {
  display: flex;
  gap: 12px;
  align-items: flex-start;
  background: linear-gradient(90deg, #f0f6ff 0, #fff 100%);
  border-left: 4px solid var(--accent-2);
  padding: 12px;
  border-radius: 8px;
  border: 1px solid rgba(15, 60, 244, 0.05);
}

.cv-notice-muted {
  background: #fbfbfd;
  border-left-color: #9ca3af;
}

.cv-notice-icon {
  color: var(--accent-2);
  font-size: 18px;
  margin-top: 2px;
}

.cv-notice-text {
  font-size: 0.95rem;
  color: #0f1724;
}

.cv-notice-close {
  background: none;
  border: 0;
  font-size: 18px;
  color: #9aa2b2;
  cursor: pointer;
  margin-left: auto;
}

/* ===========================
   TABS
   =========================== */
.cv-topbar-tabs {
  margin-top: 1rem;
  display: flex;
  gap: 0.5rem;
  border-bottom: 2px solid #e5e7eb;
}

.cv-tab {
  background: none;
  border: none;
  padding: 0.5rem 1rem;
  font-size: 0.95rem;
  cursor: pointer;
  border-bottom: 2px solid transparent;
  transition: all 0.2s ease;
}

.cv-tab[aria-selected="true"] {
  border-bottom-color: #3b82f6;
  font-weight: 600;
  color: #3b82f6;
}

.cv-tab:hover {
  color: #2563eb;
}

/* ===========================
   ACORDEÓN (Información Curso)
   =========================== */
.cv-accordion {
  border: 1px solid var(--border);
  border-radius: 10px;
  background: var(--card);
  box-shadow: var(--shadow);
  margin-bottom: 16px;
  overflow: visible;
  transition: all 0.3s ease;
}

.cv-accordion-btn {
  width: 100%;
  padding: 12px 16px;
  background: none;
  border: 0;
  text-align: left;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 700;
  color: #0f1724;
}

.cv-accordion-btn .chev {
  margin-left: auto;
  transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  color: var(--muted);
}

.cv-accordion.open .cv-accordion-btn .chev {
  transform: rotate(180deg);
}

.cv-accordion-content {
  padding: 0 16px;
  border-top: 1px solid var(--border);
  color: var(--muted);
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.35s ease, padding 0.3s ease;
}

.cv-accordion.open .cv-accordion-content {
  padding: 12px 16px;
  max-height: 800px;
  overflow: visible;
}

/* ===========================
   BIMESTRE
   =========================== */
.cv-bimestre {
  border-top: 3px solid var(--accent-2);
  border-radius: 10px;
  background: var(--card);
  margin-bottom: 20px;
  box-shadow: var(--shadow);
  overflow: visible; /* ✅ Permite expansión total */
  
}

.cv-bimestre-head {
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  cursor: pointer;
  background: linear-gradient(180deg, #0f3cf4 0%, #0f3cf4 100%);
  color: #fff;
  font-weight: 700;
}

.cv-bimestre-head .chev {
  margin-left: auto;
  transition: transform 0.25s ease;
}

.cv-bimestre.open .cv-bimestre-head .chev {
  transform: rotate(180deg);
}

.cv-bimestre-body {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.45s ease, padding 0.3s ease;
  background: #f9fafb;
  padding: 0;
}

.cv-bimestre.open .cv-bimestre-body {
  max-height: 9999px; /* ✅ Se abre completo */
  overflow: visible;
  padding: 20px 24px;
}

/* ===========================
   SEMANA
   =========================== */
.cv-week {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 10px;
  margin-bottom: 12px;
  overflow: hidden;
  box-shadow: 0 4px 14px rgba(2, 6, 23, 0.03);
}

.cv-week-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  background: linear-gradient(180deg, #fbfdff, #f3f4f6);
  gap: 10px;
}

.cv-week-toggle {
  background: none;
  border: 0;
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  font-weight: 700;
  color: #0f1724;
}

.cv-week-toggle .chev {
  color: var(--muted);
  transition: transform 0.25s ease;
  margin-left: auto;
}

.cv-week.open .cv-week-toggle .chev {
  transform: rotate(180deg);
}

.cv-week-body {
  padding: 0 33px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, padding 0.25s ease;
}

.cv-week.open .cv-week-body {
  padding: 12px 16px;
  max-height: 9999px; /* ✅ expansión completa */
  overflow: visible;
}

/* ===========================
   MATERIALES
   =========================== */
.cv-material-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 10px 0;
  border-top: 1px dashed rgba(0, 0, 0, 0.04);
}

.cv-material-row:first-of-type {
  border-top: none;
}

.cv-left {
  display: flex;
  align-items: center;
  gap: 12px;
}

.cv-icon {
  width: 44px;
  height: 44px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #eef6ff, #fff);
  color: var(--accent-2);
  font-size: 18px;
}

.cv-meta {
  display: flex;
  flex-direction: column;
}

.cv-type {
  font-size: 0.85rem;
  color: var(--muted);
}

.cv-title {
  font-weight: 700;
  color: #0f1724;
}

.cv-due {
  color: var(--muted);
  font-size: 0.9rem;
  min-width: 110px;
  text-align: right;
}

/* ===========================
   BOTONES
   =========================== */
.add-material-btn,
.student-upload-btn {
  background: var(--accent-2);
  color: #fff;
  border: 0;
  padding: 8px 12px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 700;
  display: inline-flex;
  gap: 8px;
  align-items: center;
  transition: transform 0.2s ease;
}

.student-upload-btn {
  background: var(--success);
}

.add-material-btn:hover,
.student-upload-btn:hover {
  transform: translateY(-2px);
}

/* ===========================
   OTROS
   =========================== */
.panel {
  display: none;
}

.panel.active {
  display: block;
}

button:focus,
a:focus,
input:focus,
select:focus {
  outline: 3px solid rgba(15, 60, 244, 0.12);
  outline-offset: 3px;
  border-radius: 8px;
}

@media (max-width: 900px) {
  .layout {
    flex-direction: column;
    padding: 12px;
  }

  .main-content {
    padding: 12px;
  }

  .cv-week-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }
}

/* ===========================
   ACORDEÓN DE ENTREGAS
   =========================== */
.cv-week-received {
  margin-top: 14px;
  padding: 12px;
  border-radius: 10px;
  background: linear-gradient(180deg, #ffffff, #fbfdff);
  border: 1px solid rgba(15, 23, 42, 0.04);
  box-shadow: 0 6px 18px rgba(2, 6, 23, 0.03);
}


   /* ===========================
   📦 CONTENEDOR DE ENTREGAS
=========================== */
.submissions-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
  margin-top: 18px;
  padding: 4px 0;
}

/* ===========================
   🗂️ TARJETA INDIVIDUAL
=========================== */
.submission-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 18px;
  box-shadow: 0 2px 8px rgba(15, 23, 42, 0.05);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: all 0.25s ease;
}

.submission-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(15, 23, 42, 0.12);
}

/* ===========================
   👤 INFORMACIÓN DEL ESTUDIANTE
=========================== */
.submission-info {
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 1;
}

.submission-icon {
  width: 46px;
  height: 46px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  font-size: 20px;
  color: #fff;
  flex-shrink: 0;
}

/* 🎨 Colores según tipo de entrega */
.submission-icon.pdf   { background: linear-gradient(135deg, #f87171, #ef4444); } /* Rojo */
.submission-icon.link  { background: linear-gradient(135deg, #60a5fa, #2563eb); } /* Azul */
.submission-icon.word  { background: linear-gradient(135deg, #818cf8, #4f46e5); } /* Morado */
.submission-icon.other { background: linear-gradient(135deg, #a3a3a3, #737373); } /* Gris */

/* ===========================
   📝 TEXTOS
=========================== */
.submission-meta {
  display: flex;
  flex-direction: column;
}

.submission-meta .name {
  font-weight: 600;
  color: #0f172a;
  font-size: 0.95rem;
}

.submission-meta .title {
  font-size: 0.85rem;
  color: #64748b;
}

/* ===========================
   🟢 ESTADOS Y ACCIONES
=========================== */
.submission-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  justify-content: flex-end;
}

.submission-status {
  font-size: 0.78rem;
  padding: 5px 12px;
  border-radius: 999px;
  font-weight: 600;
  text-transform: capitalize;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  letter-spacing: 0.2px;
}

/* Colores según estado */
.submission-status.pendiente {
  background: #fff7ed;
  color: #b45309;
}
.submission-status.revisado {
  background: #dcfce7;
  color: #166534;
}
.submission-status.devuelto {
  background: #fef2f2;
  color: #991b1b;
}

.submission-date {
  font-size: 0.8rem;
  color: #94a3b8;
}

/* ===========================
   🔘 BOTONES
=========================== */
.submission-btn {
  background: #2563eb;
  color: #fff;
  border: none;
  padding: 6px 10px;
  border-radius: 8px;
  cursor: pointer;
  font-size: 0.82rem;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: all 0.2s ease;
  text-decoration: none;
}

.submission-btn:hover {
  background: #1d4ed8;
}

.submission-btn.secondary {
  background: #f3f4f6;
  color: #111827;
}

.submission-btn.secondary:hover {
  background: #e5e7eb;
}

/* ===========================
   📱 RESPONSIVE (móvil)
=========================== */
@media (max-width: 768px) {
  .submission-card {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .submission-actions {
    width: 100%;
    justify-content: space-between;
  }
}


</style>

</head>
<body>
  <!-- navbar/sidebar (no quitar) -->
  <div id="navbar-container"></div>
  <div class="layout">
    <div id="sidebar-container"></div>

    <main class="main-content">

      <!-- NOTICIAS -->
      <div class="news-section" aria-label="Noticias del curso">
        <div class="news-header">Anuncio del curso</div>
        <div class="news-list">
          <div class="cv-notice">
            <div class="cv-notice-icon"><i class="fas fa-bell"></i></div>
            <div class="cv-notice-text">Se ha publicado la rúbrica de evaluación para el Proyecto de la recta. Revisa la sección de Tareas.</div>
            <button class="cv-notice-close" aria-label="Cerrar noticia">&times;</button>
          </div>
          <div class="cv-notice cv-notice-muted">
            <div class="cv-notice-icon"><i class="fas fa-video"></i></div>
            <div class="cv-notice-text">Recordatorio: la clase en vivo de este jueves será a las 6pm (hora local) y será grabada.</div>
            <button class="cv-notice-close" aria-label="Cerrar noticia">&times;</button>
          </div>
        </div>
      </div>

      <!-- Top bar / tabs -->
      <div style="display:flex;align-items:flex-start;gap:12px;flex-direction:column">
        <div class="cv-topbar" style="width:100%;">
          <div style="flex:1">
            <strong>Curso: Comprensión y Redacción de Textos II (Docente)</strong>
            <div class="cv-topbar-tabs" role="tablist" aria-label="Pestañas del curso" style="margin-top:10px">
              <button class="cv-tab" data-panel="panel-contenido" aria-selected="true">Contenido</button>
              <button class="cv-tab" data-panel="panel-foros" aria-selected="false">Foros</button>
              <button class="cv-tab" data-panel="panel-tareas" aria-selected="false">Tareas</button>
            </div>
          </div>
        </div>

        <!-- Información del curso -->
        <div class="cv-accordion" id="courseInfo">
          <button class="cv-accordion-btn" aria-expanded="false">
            <i class="fas fa-info-circle"></i> Información del curso <span class="chev">&#x25BE;</span>
          </button>
          <div class="cv-accordion-content">
            <p><strong>Profesor:</strong> Dariel</p>
            <p><strong>Descripción:</strong> En este curso trabajaremos comprensión y redacción avanzada con enfoque práctico.</p>
          </div>
        </div>
      </div>

      <!-- Panels (Contenido / Foros / Tareas) -->
      <section id="panel-contenido" class="panel active">
        <!-- Bimestre -->
        <div class="cv-bimestre" id="bim-3">
          <div class="cv-bimestre-head" role="button" tabindex="0" aria-expanded="false">Bimestre 3 <span class="chev">&#x25BE;</span></div>

          <div class="cv-bimestre-body">
            <!-- Semana 1 -->
<div class="cv-week" data-week="1">
  <div class="cv-week-header">
    <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 01 <span class="chev">&#x25BE;</span></button>
    <div>
      <!-- profesor puede agregar material por semana -->
      <button class="add-material-btn" type="button" data-week="1"><i class="fas fa-plus-circle"></i> Agregar material</button>
    </div>
  </div>

  <div class="cv-week-body">
    <div class="cv-session">
      <div class="cv-session-title">Sesión 1 - Material de estudio</div>
      <div class="cv-material-row">
        <div class="cv-left">
          <div class="cv-icon"><i class="fa-solid fa-file-pdf"></i></div>
          <div class="cv-meta">
            <div class="cv-type">Material · PDF</div>
            <div class="cv-title">PPT_Plano Cartesiano</div>
          </div>
        </div>
        <div class="cv-due">Sin fecha límite</div>
      </div> <!-- /.cv-material-row -->
    </div> <!-- /.cv-session -->

    <!-- ===== SECCIÓN: Material recibido (aquí, justo después de .cv-session) ===== -->
    <div class="cv-week-received" aria-live="polite">
      <h4 class="received-title">Material recibido</h4>
      <div class="received-list">Cargando...</div>
    </div>

    <!-- espacio para añadir rápidamente pequeñas notas/materiales -->
    <div class="cv-week-append"></div>
  </div> <!-- /.cv-week-body -->
</div> <!-- /.cv-week -->


            <!-- Semana 1 -->
<div class="cv-week" data-week="1">
  <div class="cv-week-header">
    <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 01 <span class="chev">&#x25BE;</span></button>
    <div>
      <!-- profesor puede agregar material por semana -->
      <button class="add-material-btn" type="button" data-week="1"><i class="fas fa-plus-circle"></i> Agregar material</button>
    </div>
  </div>

  <div class="cv-week-body">
    <div class="cv-session">
      <div class="cv-session-title">Sesión 1 - Material de estudio</div>
      <div class="cv-material-row">
        <div class="cv-left">
          <div class="cv-icon"><i class="fa-solid fa-file-pdf"></i></div>
          <div class="cv-meta">
            <div class="cv-type">Material · PDF</div>
            <div class="cv-title">PPT_Plano Cartesiano</div>
          </div>
        </div>
        <div class="cv-due">Sin fecha límite</div>
      </div> <!-- /.cv-material-row -->
    </div> <!-- /.cv-session -->

    <!-- ===== SECCIÓN: Material recibido (aquí, justo después de .cv-session) ===== -->
    <div class="cv-week-received" aria-live="polite">
      <h4 class="received-title">Material recibido</h4>
      <div class="received-list">Cargando...</div>
    </div>

    <!-- espacio para añadir rápidamente pequeñas notas/materiales -->
    <div class="cv-week-append"></div>
  </div> <!-- /.cv-week-body -->
</div> <!-- /.cv-week -->

    

<style>/* Estilos mínimos para el panel de entregas */
.modal {
  position: fixed;
  inset: 0;
  display: none;               /* .open -> display:flex */
  align-items: center;
  justify-content: center;
  background: rgba(7, 12, 24, 0.55);
  z-index: 9999;
  padding: 24px;
  -webkit-tap-highlight-color: transparent;
  transition: opacity 200ms ease;
  opacity: 0;
  backdrop-filter: blur(4px) saturate(1.02);
}

.modal.open {
  display: flex;
  opacity: 1;
}

/* Centered card */
.modal-content {
  width: 100%;
  max-width: 800px;           /* ajuste: puedes cambiar a 640px si prefieres más compacto */
  background: linear-gradient(180deg, #ffffff, #fbfdff);
  border-radius: 14px;
  box-shadow: 0 20px 60px rgba(10, 20, 40, 0.18);
  border: 1px solid rgba(15,23,42,0.06);
  overflow: hidden;
  transform: translateY(8px);
  transition: transform 220ms cubic-bezier(.2,.9,.28,1), opacity 180ms ease;
  opacity: 1;
  animation: modalPop 220ms ease;
}

/* Pop animation */
@keyframes modalPop {
  from { transform: translateY(18px) scale(.995); opacity: 0; }
  to   { transform: translateY(0) scale(1); opacity: 1; }
}

/* Modal header */
.modal-header {
  display:flex;
  align-items:center;
  gap:12px;
  padding:18px 20px;
  border-bottom: 1px solid rgba(15,23,42,0.04);
  background: linear-gradient(180deg, rgba(15,60,244,0.02), transparent);
}
.modal-header h3 {
  margin:0;
  font-size:1.05rem;
  font-weight:700;
  color: #0b1220;
}
.modal-header .close {
  margin-left:auto;
  background:transparent;
  border:0;
  font-size:18px;
  color: #6b7280;
  cursor:pointer;
  padding:6px;
  border-radius:8px;
}
.modal-header .close:focus { outline: 3px solid rgba(15,60,244,0.12); }

/* Modal body */
.modal-body {
  padding:16px 20px;
  max-height: 56vh;           /* permite scroll si el contenido es largo */
  overflow-y: auto;
  color: #123;
  font-size: 0.95rem;
  line-height:1.5;
}
.modal-body p, .modal-body label { margin:0 0 8px 0; color:#334155; }

/* Modal footer / actions */
.modal-footer {
  display:flex;
  gap:10px;
  align-items:center;
  justify-content:flex-end;
  padding:14px 20px;
  border-top: 1px solid rgba(15,23,42,0.04);
  background: linear-gradient(180deg, transparent, rgba(250,250,255,0.6));
}

/* Button utilities used in modal */
.btn {
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding:8px 12px;
  border-radius:10px;
  font-weight:700;
  font-size:0.95rem;
  cursor:pointer;
  border:0;
  transition: transform 140ms ease, box-shadow 140ms ease;
  box-shadow: 0 6px 18px rgba(2,6,23,0.04);
}
.btn:active { transform: translateY(1px); }
.btn:focus { outline: 3px solid rgba(15,60,244,0.12); outline-offset:3px; border-radius:10px; }

/* Primary / secondary */
.btn.primary {
  background: linear-gradient(90deg, var(--accent-2, #0f3cf4), var(--accent, #2563eb));
  color: #fff;
  box-shadow: 0 10px 30px rgba(15,60,244,0.12);
}
.btn.secondary {
  background: #f6f8fb;
  color: #0f1724;
  border: 1px solid #e6e9ef;
}

/* Small input style for modal controls */
.field-compact, textarea {
  width:100%;
  padding:10px 12px;
  border-radius:10px;
  border:1px solid #e6e9ef;
  background:#fff;
  font-size:0.95rem;
  color:#0f1724;
  transition: box-shadow 120ms ease, border-color 120ms ease;
}
.field-compact:focus, textarea:focus { box-shadow: 0 8px 24px rgba(15,60,244,0.06); border-color: rgba(15,60,244,0.18); outline: none; }

/* Responsive tweaks */
@media (max-width:720px) {
  .modal-content { max-width: 92vw; border-radius:12px; }
  .modal-body { max-height: 60vh; padding:14px; }
  .modal-header, .modal-footer { padding:12px 14px; }
}
</style>


    </main>
  </div>
        <!-- /prof-panel -->
      </section>
        <!-- FOROS panel -->
      <section id="panel-foros" class="panel" aria-hidden="true">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <h3 style="margin:0">Foros del curso</h3>
          <button class="add-material-btn" id="new-forum-thread"><i class="fas fa-plus"></i> Nuevo tema</button>
        </div>

        <div class="forum-list" id="forum-list">
          <!-- ejemplos -->
          <div class="forum-item">
            <div>
              <div class="forum-title">Dudas sobre la actividad 1</div>
              <div style="color:var(--muted);font-size:0.9rem">Publicado por Maria · 2 respuestas</div>
            </div>
            <div><button class="student-upload-btn" style="background:transparent;color:var(--accent-2);border:1px solid var(--border)">Ver</button></div>
          </div>

          <div class="forum-item">
            <div>
              <div class="forum-title">Consulta: formato de entrega</div>
              <div style="color:var(--muted);font-size:0.9rem">Publicado por Juan · 5 respuestas</div>
            </div>
            <div><button class="student-upload-btn" style="background:transparent;color:var(--accent-2);border:1px solid var(--border)">Ver</button></div>
          </div>
        </div>
      </section>

    <!-- TAREAS panel -->
      <section id="panel-tareas" class="panel" aria-hidden="true">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <h3 style="margin:0">Tareas</h3>
          <button class="add-material-btn" id="new-task"><i class="fas fa-plus"></i> Nueva tarea</button>
        </div>

        <div class="tasks-list" id="tasks-list">
          <div class="task-item">
            <div>
              <strong>Actividad 1: Ensayo</strong>
              <div style="color:var(--muted);font-size:0.9rem">Entrega: 2025-09-20 · Semana 3</div>
            </div>
            <div><span class="pill" style="background:#fff3cd;color:#92400e">Pendiente</span></div>
          </div>

          <div class="task-item">
            <div>
              <strong>Proyecto: Aplicación de la recta</strong>
              <div style="color:var(--muted);font-size:0.9rem">Entrega: 2025-10-05 · Semana 4</div>
            </div>
            <div><span class="pill revisado">Revisado</span></div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- Modal agregar material (profesor) -->
  <div id="profAddModal" class="modal" aria-hidden="true">
    <div class="modal-content" role="dialog" aria-modal="true">
      <h3>Agregar material</h3>
      <form id="profAddForm" enctype="multipart/form-data">
        <input type="hidden" name="week" id="prof_week_id">
        <label>Título</label>
        <input type="text" id="prof_title" name="title" placeholder="Ej. PPT - Clase" required>
        <label style="margin-top:8px">Tipo</label>
        <select id="prof_type" name="type">
          <option value="pdf">PDF</option>
          <option value="url">Enlace (URL)</option>
        </select>

        <div id="prof_file_row" style="margin-top:8px">
          <label>Archivo (PDF)</label>
          <input type="file" id="prof_file" name="file" accept="application/pdf">
        </div>

        <div id="prof_url_row" style="display:none;margin-top:8px">
          <label>URL</label>
          <input type="url" id="prof_url" name="url" placeholder="https://...">
        </div>

        <div style="display:flex;justify-content:flex-end;gap:8px;margin-top:12px">
          <button type="button" class="btn" id="prof_cancel" style="background:#eef2ff;padding:8px 12px;border-radius:8px">Cancelar</button>
          <button type="submit" class="btn" style="background:var(--accent-2);color:#fff;padding:8px 12px;border-radius:8px">Agregar</button>
        </div>
      </form>
    </div>
  </div>
<!-- MODAL DETALLE (DOCENTE) - HTML + JS funcional -->
<div id="detailModal" class="modal" aria-hidden="true" role="dialog" aria-labelledby="detailTitle">
  <div class="modal-content" role="document" aria-modal="true">
    <div class="modal-header">
      <h3 id="detailTitle">Detalle de entrega</h3>
      <button class="close" id="closeDetailBtn" aria-label="Cerrar modal">&times;</button>
    </div>

    <div class="modal-body" id="detailBody">
      <!-- Contenido rellenado por JS -->
      <div style="display:grid;gap:10px">
        <div><strong>Título:</strong> <span id="d_titulo"></span></div>
        <div><strong>Alumno:</strong> <span id="d_alumno"></span></div>
        <div><strong>Enviado:</strong> <span id="d_creado"></span></div>
        <div><strong>Recurso:</strong> <span id="d_recurso"></span></div>

        <label for="estadoSelect">Estado</label>
        <select id="estadoSelect" class="field-compact">
          <option value="enviado">Enviado</option>
          <option value="pendiente">Pendiente</option>
          <option value="revisado">Revisado</option>
          <option value="rechazado">Rechazado</option>
        </select>

        <label for="calificacionInput">Calificación</label>
        <input id="calificacionInput" class="field-compact" type="text" placeholder="Ej. 15/20 o 8.5">

        <label for="comentarioTextarea">Comentario</label>
        <textarea id="comentarioTextarea" class="field-compact" rows="4" placeholder="Comentarios para el estudiante..."></textarea>

        <div class="modal-note" id="detailNote">Cambios guardados localmente tras enviar.</div>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn secondary" id="cancelDetailBtn">Cerrar</button>
      <button class="btn primary" id="saveDetailBtn">Guardar cambios</button>
    </div>
  </div>
</div>
  <!-- Modal estudiante: Subir entrega -->
  <div id="studentUploadModal" class="modal" aria-hidden="true">
    <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="studentUploadTitle">
      <h3 id="studentUploadTitle">Subir entrega</h3>
      <form id="studentUploadForm" enctype="multipart/form-data">
        <input type="hidden" name="week_id" id="stu_week_id">
        <label for="stu_title">Título</label>
        <input type="text" id="stu_title" name="title" placeholder="Ej. Actividad 1 - Nombre" required>
        <label style="margin-top:8px" for="stu_type">Tipo</label>
        <select id="stu_type" name="type">
          <option value="archivo">Archivo (PDF/DOC)</option>
          <option value="enlace">Enlace (URL)</option>
        </select>
        <div id="stu_file_row" style="margin-top:8px">
          <label for="stu_file">Archivo</label>
          <input type="file" id="stu_file" name="file" accept=".pdf,.doc,.docx">
          <small class="small-muted">Tamaño máximo 25MB.</small>
        </div>
        <div id="stu_url_row" style="display:none;margin-top:8px">
          <label for="stu_url">URL</label>
          <input type="url" id="stu_url" name="url" placeholder="https://...">
        </div>

        <div style="display:flex;justify-content:flex-end;gap:8px;margin-top:12px">
          <button type="button" class="btn" id="stu_cancel" style="background:#eef2ff;padding:8px 12px;border-radius:8px">Cancelar</button>
          <button type="submit" class="btn" style="background:var(--accent-2);color:#fff;padding:8px 12px;border-radius:8px">Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- SCRIPTS -->
<script>
/* carga navbar/sidebar (no quitar) */
async function loadComponent(id, file, callback) {
  try {
    const resp = await fetch(file);
    if (!resp.ok) return;
    const text = await resp.text();
    document.getElementById(id).innerHTML = text;
    if (typeof callback === 'function') callback();
  } catch (err) { console.warn('Error cargando', file, err); }
}
loadComponent("navbar-container","navbar.php");
loadComponent("sidebar-container","sidebar.php", () => { if(window.initSidebar) window.initSidebar(); });

document.addEventListener('DOMContentLoaded', () => {

  /* ----------------- Utilidades ----------------- */
  function esc(s){ if(s==null) return ''; return String(s).replace(/[&<>"']/g, m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
  function resolveUrl(path){
    if(!path) return null;
    if(/^https?:\/\//i.test(path)) return path;
    if(path.charAt(0)==='/') path = path.slice(1);
    return window.location.origin + '/' + path;
  }

  /* ----------------- UI: Tabs / acordeones base ----------------- */
  document.querySelectorAll('.cv-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      const panelId = tab.getAttribute('data-panel');
      document.querySelectorAll('.cv-tab').forEach(t => t.setAttribute('aria-selected','false'));
      document.querySelectorAll('.panel').forEach(p => { p.classList.remove('active'); p.setAttribute('aria-hidden','true'); });
      tab.setAttribute('aria-selected','true');
      const panel = document.getElementById(panelId);
      if (panel) { panel.classList.add('active'); panel.setAttribute('aria-hidden','false'); }
    });
  });



  const accordion = document.getElementById('courseInfo');
  if (accordion) {
    const accBtn = accordion.querySelector('.cv-accordion-btn');
    if (accBtn) accBtn.addEventListener('click', () => {
      accordion.classList.toggle('open');
      const open = accordion.classList.contains('open');
      accBtn.setAttribute('aria-expanded', String(open));
    });
  }




// ===============================
//   BIMESTRES
// ===============================
// ==========================
// Bimestres (sin límite de altura)
// ==========================
document.querySelectorAll('.cv-bimestre-head').forEach(head => {
  head.addEventListener('click', () => {
    const bim = head.closest('.cv-bimestre');
    if (!bim) return;

    const body = bim.querySelector('.cv-bimestre-body');
    bim.classList.toggle('open');

    if (bim.classList.contains('open')) {
      head.setAttribute('aria-expanded', 'true');
      // ✅ No usamos maxHeight fija: dejamos que crezca naturalmente
      body.style.maxHeight = "100000px"; // Muy grande, nunca se corta
      body.style.overflow = "visible";
    } else {
      head.setAttribute('aria-expanded', 'false');
      body.style.maxHeight = null;
      body.style.overflow = "hidden";
    }
  });
});


// ==========================
// Semanas dentro del bimestre
// ==========================
document.querySelectorAll('.cv-week').forEach(week => {
  const toggle = week.querySelector('.cv-week-toggle');
  const body = week.querySelector('.cv-week-body');
  if (!toggle || !body) return;

  toggle.addEventListener('click', () => {
    const isOpen = week.classList.contains('open');
    week.classList.toggle('open', !isOpen);

    if (!isOpen) {
      // 🔹 Al abrir: expande completamente
      body.style.maxHeight = "99999px";
      body.style.overflow = "visible";
    } else {
      // 🔹 Al cerrar: oculta de nuevo
      body.style.maxHeight = null;
      body.style.overflow = "hidden";
    }

    // ✅ Expande también el bimestre padre (si existe)
    const bim = week.closest('.cv-bimestre');
    if (bim && bim.classList.contains('open')) {
      const bimBody = bim.querySelector('.cv-bimestre-body');
      if (bimBody) {
        bimBody.style.maxHeight = "999999px";
        bimBody.style.overflow = "visible";
      }
    }
  });
});



  /* ----------------- Modales (referencias y helpers) ----------------- */
  const stuModal = document.getElementById('studentUploadModal'); // corregido: id real
  const profModal = document.getElementById('profAddModal');
  const detailModal = document.getElementById('detailModal');

  const openModal = m => { if(!m) return; m.classList.add('open'); m.setAttribute('aria-hidden','false'); };
  const closeModal = m => { if(!m) return; m.classList.remove('open'); m.setAttribute('aria-hidden','true'); };

  // Abrir student modal desde botones (si hay)
  document.querySelectorAll('.student-upload-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const wk = btn.getAttribute('data-week') || '';
      const sti = document.getElementById('stu_week_id');
      if (sti) sti.value = wk;
      if (document.getElementById('stu_title')) document.getElementById('stu_title').value = '';
      if (document.getElementById('stu_file')) document.getElementById('stu_file').value = '';
      if (document.getElementById('stu_url')) document.getElementById('stu_url').value = '';
      if (document.getElementById('stu_type')) document.getElementById('stu_type').value = 'archivo';
      if (document.getElementById('stu_file_row')) document.getElementById('stu_file_row').style.display = '';
      if (document.getElementById('stu_url_row')) document.getElementById('stu_url_row').style.display = 'none';
      openModal(stuModal);
    });
  });

  // Abrir prof modal global
  const profAddGlobalBtn = document.getElementById('profAddGlobalBtn');
  if (profAddGlobalBtn) profAddGlobalBtn.addEventListener('click', () => {
    if (document.getElementById('prof_week_id')) document.getElementById('prof_week_id').value = '';
    if (document.getElementById('prof_title')) document.getElementById('prof_title').value = '';
    if (document.getElementById('prof_file')) document.getElementById('prof_file').value = '';
    if (document.getElementById('prof_url')) document.getElementById('prof_url').value = '';
    if (document.getElementById('prof_type')) document.getElementById('prof_type').value = 'pdf';
    if (document.getElementById('prof_file_row')) document.getElementById('prof_file_row').style.display = '';
    if (document.getElementById('prof_url_row')) document.getElementById('prof_url_row').style.display = 'none';
    openModal(profModal);
  });

  // Abrir prof modal desde botones por semana
  document.querySelectorAll('.add-material-btn[data-week]').forEach(btn => {
    btn.addEventListener('click', () => {
      const wk = btn.getAttribute('data-week') || '';
      if (document.getElementById('prof_week_id')) document.getElementById('prof_week_id').value = wk;
      if (document.getElementById('prof_title')) document.getElementById('prof_title').value = '';
      if (document.getElementById('prof_file')) document.getElementById('prof_file').value = '';
      if (document.getElementById('prof_url')) document.getElementById('prof_url').value = '';
      if (document.getElementById('prof_type')) document.getElementById('prof_type').value = 'pdf';
      if (document.getElementById('prof_file_row')) document.getElementById('prof_file_row').style.display = '';
      if (document.getElementById('prof_url_row')) document.getElementById('prof_url_row').style.display = 'none';
      openModal(profModal);
    });
  });

  // cerrar modales con botones
  const stuCancelBtn = document.getElementById('stu_cancel');
  if (stuCancelBtn) stuCancelBtn.addEventListener('click', ()=>closeModal(stuModal));
  const profCancelBtn = document.getElementById('prof_cancel');
  if (profCancelBtn) profCancelBtn.addEventListener('click', ()=>closeModal(profModal));

  if (stuModal) stuModal.addEventListener('click', e => { if(e.target===stuModal) closeModal(stuModal); });
  if (profModal) profModal.addEventListener('click', e => { if(e.target===profModal) closeModal(profModal); });

  // cerrar detalle
  const closeDetailBtn = document.getElementById('closeDetailBtn');
  if (closeDetailBtn) closeDetailBtn.addEventListener('click', ()=> closeModal(detailModal));
  const cancelDetailBtn = document.getElementById('cancelDetailBtn');
  if (cancelDetailBtn) cancelDetailBtn.addEventListener('click', ()=> closeModal(detailModal));

  // cambiar tipo student / prof (mostrar campo file/url)
  const stuTypeSel = document.getElementById('stu_type');
  if (stuTypeSel) stuTypeSel.addEventListener('change', e => {
    const val = e.target.value;
    if (document.getElementById('stu_file_row')) document.getElementById('stu_file_row').style.display = val === 'archivo' ? '' : 'none';
    if (document.getElementById('stu_url_row')) document.getElementById('stu_url_row').style.display = val === 'enlace' ? '' : 'none';
  });
  const profTypeSel = document.getElementById('prof_type');
  if (profTypeSel) profTypeSel.addEventListener('change', e => {
    const val = e.target.value;
    if (document.getElementById('prof_file_row')) document.getElementById('prof_file_row').style.display = val === 'pdf' ? '' : 'none';
    if (document.getElementById('prof_url_row')) document.getElementById('prof_url_row').style.display = val === 'url' ? '' : 'none';
  });

  /* ----------------- Submissions: Accordion render ----------------- */
  const submissionsContainer = document.getElementById('submissionsContainer');
  const filterWeek = document.getElementById('filter-week');
  const btnRefresh = document.getElementById('btn-refresh');
  const btnExport = document.getElementById('btn-export');

  let currentData = []; // cache

  // Cargar entregas desde backend (api_maestro.php)
  async function loadSubmissions(){
    if (!submissionsContainer) return;
    submissionsContainer.innerHTML = 'Cargando entregas...';
    const week = filterWeek ? filterWeek.value : '';
    let url = 'api_maestro.php' + (week ? '?week=' + encodeURIComponent(week) : '');
    try {
      const res = await fetch(url, { credentials:'include' });
      const json = await res.json();
      if (!json.ok) { submissionsContainer.innerHTML = '<strong>Error:</strong> ' + esc(json.msg || ''); return; }
      currentData = json.data || [];
      renderGrouped(currentData);
    } catch (err) {
      console.error(err);
      submissionsContainer.innerHTML = '<strong>Error cargando entregas.</strong>';
    }
  }

  // Render agrupado por semana -> alumno -> entregas
  function renderGrouped(rows){
    if(!submissionsContainer) return;
    if(!rows || rows.length === 0) {
      submissionsContainer.innerHTML = '<em>No hay entregas.</em>';
      return;
    }

    // agrupar por semana { semana: { usuarioId: { usuario_nombre, entregas: [] } } }
    const byWeek = {};
    rows.forEach(r => {
      const wk = r.semana_id ? String(r.semana_id) : '0';
      byWeek[wk] = byWeek[wk] || {};
      const uid = r.usuario_id ? String(r.usuario_id) : ('anon_' + (r.usuario_nombre||'sin-nombre'));
      byWeek[wk][uid] = byWeek[wk][uid] || { usuario_nombre: r.usuario_nombre || 'Alumno', entregas: [] };
      // normalizar url si no existe
      r.archivo_url = r.archivo ? resolveUrl(r.archivo) : null;
      byWeek[wk][uid].entregas.push(r);
    });

    const weeks = Object.keys(byWeek).sort((a,b)=> Number(a)-Number(b));
    let html = '';

    weeks.forEach(wk => {
      const alumnosObj = byWeek[wk];
      const alumnosKeys = Object.keys(alumnosObj);
      const weekLabel = wk === '0' ? 'General' : 'Semana ' + wk;
      html += `<details class="semana"><summary>📘 ${esc(weekLabel)} <span class="details-week-badge">${alumnosKeys.length} alumno(s)</span></summary><div class="semana-body">`;

      alumnosKeys.forEach(uid => {
        const alumno = alumnosObj[uid];
        const entregas = alumno.entregas.sort((a,b)=> new Date(b.creado_at) - new Date(a.creado_at));
        const name = alumno.usuario_nombre || 'Alumno';
        const initials = (name.split(' ').map(s=>s[0]||'').slice(0,2).join('') || 'A').toUpperCase();
        html += `<details class="alumno"><summary>
                  <div class="alumno-avatar" title="${esc(name)}">${esc(initials)}</div>
                  <div class="alumno-name">${esc(name)}</div>
                  <div class="alumno-count">${entregas.length} ent.</div>
                 </summary>
                 <div class="entregas">`;

        entregas.forEach(e => {
          const tipoIcon = (e.tipo === 'archivo' || e.archivo_url) ? '📄' : '🔗';
          const fileName = e.archivo_url ? (e.archivo_url.split('/').pop() || e.archivo || 'archivo') : (e.enlace ? e.enlace : 'sin recurso');
          const archivoLink = e.archivo_url ? `<a href="${esc(e.archivo_url)}" target="_blank" rel="noopener">${esc(fileName)}</a>` :
                              (e.enlace ? `<a href="${esc(e.enlace)}" target="_blank" rel="noopener">Abrir enlace</a>` : '<em>sin recurso</em>');
          const estado = (e.estado || 'enviado').toLowerCase();
          html += `<div class="entrega-row" data-id="${esc(e.id)}">
                     <div class="entrega-left">
                       <div class="entrega-icon">${tipoIcon}</div>
                       <div class="entrega-meta">
                         <div class="title">${esc(e.titulo)}</div>
                         <div class="sub">${archivoLink} · ${esc(e.creado_at)}</div>
                       </div>
                     </div>
                     <div class="entrega-actions">
                       <div class="estado-badge ${esc(estado)}">${esc(estado)}</div>
                       ${ e.archivo_url ? `<a class="btn small" href="${esc(e.archivo_url)}" target="_blank" rel="noopener" download>Descargar</a>` : '' }
                       ${ e.enlace ? `<a class="btn small" href="${esc(e.enlace)}" target="_blank" rel="noopener">Abrir enlace</a>` : '' }
                       <button class="btn small primary" onclick="openDetail(${esc(e.id)})">Revisar</button>
                     </div>
                   </div>`;
        });

        html += `</div></details>`;
      });

      html += `</div></details>`;
    });

    submissionsContainer.innerHTML = html;
  }

  /* ----------------- Abrir modal detalle y editar ----------------- */
  window.openDetail = function(id){
    const item = currentData.find(x => String(x.id) === String(id));
    if (!item) return alert('Entrega no encontrada');

    // Rellenar campos en el modal (usa ids existentes en tu HTML)
    const detailTitle = document.getElementById('detailTitle');
    if (detailTitle) detailTitle.textContent = `Entrega — ${item.titulo}`;

    const d_titulo = document.getElementById('d_titulo');
    const d_alumno = document.getElementById('d_alumno');
    const d_creado = document.getElementById('d_creado');
    const d_recurso = document.getElementById('d_recurso');

    if (d_titulo) d_titulo.textContent = item.titulo;
    if (d_alumno) d_alumno.textContent = item.usuario_nombre || 'Alumno';
    if (d_creado) d_creado.textContent = item.creado_at;
    if (d_recurso) {
      if (item.archivo_url) d_recurso.innerHTML = `<a href="${esc(item.archivo_url)}" target="_blank" rel="noopener">Abrir archivo</a>`;
      else if (item.enlace) d_recurso.innerHTML = `<a href="${esc(item.enlace)}" target="_blank" rel="noopener">Abrir enlace</a>`;
      else d_recurso.innerHTML = '<em>No hay recurso</em>';
    }

    // inputs
    const estadoSelect = document.getElementById('estadoSelect');
    const calInput = document.getElementById('calificacionInput');
    const comTextarea = document.getElementById('comentarioTextarea');

    if (estadoSelect) estadoSelect.value = item.estado || 'enviado';
    if (calInput) calInput.value = item.calificacion ?? '';
    if (comTextarea) comTextarea.value = item.comentario ?? '';

    // guardar id en modal dataset
    if (detailModal) detailModal.dataset.currentId = String(item.id);
    openModal(detailModal);
  };

  // Guardar cambios: estado / calificación / comentario
  const saveDetailBtn = document.getElementById('saveDetailBtn');
  if (saveDetailBtn) {
    saveDetailBtn.addEventListener('click', async () => {
      if (!detailModal) return;
      const id = detailModal.dataset.currentId;
      if (!id) return alert('ID no encontrado');

      const estado = document.getElementById('estadoSelect') ? document.getElementById('estadoSelect').value : '';
      const cal = document.getElementById('calificacionInput') ? document.getElementById('calificacionInput').value.trim() : '';
      const com = document.getElementById('comentarioTextarea') ? document.getElementById('comentarioTextarea').value.trim() : '';

      try {
        const fd = new FormData();
        fd.append('id', id);
        fd.append('estado', estado);
        // si tu endpoint los maneja, envía calificacion y comentario
        fd.append('calificacion', cal);
        fd.append('comentario', com);

        const res = await fetch('api_maestro_update_submission.php', {
          method: 'POST',
          credentials: 'include',
          body: fd
        });
        const json = await res.json();
        if (!json.ok) throw new Error(json.msg || 'Error actualizando');

        // actualizar UI: recargar entregas
        closeModal(detailModal);
        await loadSubmissions();
        // si existe área profesor que requiere recarga
        if (typeof loadProfessorSubmissions === 'function') loadProfessorSubmissions();
        alert('Cambios guardados.');
      } catch (err) {
        console.error(err);
        alert('Error guardando: ' + (err.message || 'revisa consola'));
      }
    });
  }

  /* ----------------- Formularios: subir / agregar material (mantener funcionalidad) ----------------- */

  // Envío formulario student (subir entrega)
  const studentForm = document.getElementById('studentUploadForm');
  if (studentForm) {
    studentForm.addEventListener('submit', async (ev) => {
      ev.preventDefault();
      const title = document.getElementById('stu_title') ? document.getElementById('stu_title').value.trim() : '';
      const type = document.getElementById('stu_type') ? document.getElementById('stu_type').value : '';
      const fileEl = document.getElementById('stu_file');
      const urlEl = document.getElementById('stu_url');
      const week = document.getElementById('stu_week_id') ? document.getElementById('stu_week_id').value || '' : '';

      if (!title) { alert('Ingresa un título'); return; }
      if (type === 'archivo' && (!fileEl || !fileEl.files.length)) { alert('Selecciona un archivo'); return; }
      if (type === 'enlace' && (!urlEl || !urlEl.value.trim())) { alert('Ingresa una URL'); return; }

      const fd = new FormData(studentForm);
      if (week && !fd.get('week_id')) fd.append('week_id', week);

      try {
        const res = await fetch('submit_material.php', { method:'POST', body: fd, credentials: 'include' });
        const json = await res.json();
        if (!json.ok) throw new Error(json.msg || 'Error servidor');

        // Insertar visualmente (si está la semana)
        const targetWeek = json.week_id || week;
        const weekEl = document.querySelector('.cv-week[data-week="'+targetWeek+'"]');
        if (weekEl) {
          const append = weekEl.querySelector('.cv-week-append');
          if (append) {
            const div = document.createElement('div');
            div.className = 'cv-material-row';
            const titleHtml = (json.archivo || json.enlace) ? `<a href="${json.archivo||json.enlace}" target="_blank" rel="noopener">${esc(json.titulo)}</a>` : esc(json.titulo);
            div.innerHTML = `<div class="cv-left"><div class="cv-icon">${json.tipo==='archivo'?'<i class="fas fa-file"></i>':'<i class="fas fa-link"></i>'}</div>
              <div class="cv-meta"><div class="cv-type">Entrega · ${esc(json.tipo)}</div><div class="cv-title">${titleHtml}</div></div></div>
              <div class="cv-due"><span class="pill" style="background:#fff3cd;color:#92400e">Enviado</span></div>`;
            append.prepend(div);
            if (!weekEl.classList.contains('open')) {
              const toggle = weekEl.querySelector('.cv-week-toggle');
              if (toggle) toggle.click();
            }
          }
        }

        closeModal(stuModal);
        alert('Entrega enviada correctamente.');
        // recargar listado docente (accordion)
        await loadSubmissions();
        if (typeof loadProfessorSubmissions === 'function') loadProfessorSubmissions();
      } catch (err) {
        console.error(err);
        alert('Error al enviar: ' + (err.message || 'Revisa la consola.'));
      }
    });
  }

  // Envío formulario prof agregar material -> ept-estudiante.php (mantener)
  const profForm = document.getElementById('profAddForm');
  if (profForm) {
    profForm.addEventListener('submit', async (ev) => {
      ev.preventDefault();
      const title = document.getElementById('prof_title') ? document.getElementById('prof_title').value.trim() : '';
      const week = document.getElementById('prof_week_id') ? document.getElementById('prof_week_id').value || '' : '';
      if (!title) { alert('Ingresa título'); return; }

      const fd = new FormData(profForm);
      if (week && !fd.get('week')) fd.append('week', week);

      try {
        const res = await fetch('ept-estudiante.php', { method:'POST', body: fd, credentials: 'include' });
        const json = await res.json();
        if (!json.ok) throw new Error(json.msg || 'Error servidor');

        const targetWeek = json.semana || week;
        if (targetWeek) {
          const weekEl = document.querySelector('.cv-week[data-week="'+targetWeek+'"]');
          if (weekEl) {
            const append = weekEl.querySelector('.cv-week-append');
            if (append) {
              const div = document.createElement('div');
              div.className = 'cv-material-row';
              const linkHtml = json.url ? `<a href="${json.url}" target="_blank" rel="noopener">${esc(json.titulo)}</a>` :
                               (json.archivo ? `<a href="${json.archivo}" target="_blank" rel="noopener">${esc(json.titulo)}</a>` : esc(json.titulo));
              div.innerHTML = `<div class="cv-left"><div class="cv-icon"><i class="fa-solid fa-file-pdf"></i></div>
                <div class="cv-meta"><div class="cv-type">Material · ${esc(json.tipo||'pdf')}</div><div class="cv-title">${linkHtml}</div></div></div>
                <div class="cv-due"><span class="pill" style="background:#d1e8ff;color:#0f3cf4">Agregado</span></div>`;
              append.prepend(div);
              if (!weekEl.classList.contains('open')) {
                const toggle = weekEl.querySelector('.cv-week-toggle');
                if (toggle) toggle.click();
              }
            }
          }
        }
        closeModal(profModal);
        alert('Material enviado a estudiantes correctamente.');
      } catch (err) {
        console.error(err);
        alert('Error al agregar material: ' + (err.message || 'Revisa la consola.'));
      }
    });
  }

  /* ----------------- Función existente: loadProfessorSubmissions (mantener si la tienes) ----------------- */
  // Si ya existe en tu código y quieres mantenerla, la llamaremos más abajo.
  // Si no existe, no hace nada.
  async function loadProfessorSubmissionsIfNeeded(){
    try {
      if (typeof loadProfessorSubmissions === 'function') {
        await loadProfessorSubmissions();
      }
    } catch(e){ /* ignorar */ }
  }

  /* ----------------- Export / Refresh handlers ----------------- */
  if (btnRefresh) btnRefresh.addEventListener('click', loadSubmissions);
  if (filterWeek) filterWeek.addEventListener('change', loadSubmissions);

  if (btnExport) {
    btnExport.addEventListener('click', async () => {
      const week = filterWeek ? filterWeek.value : '';
      const url = 'api_maestro.php' + (week ? '?week=' + encodeURIComponent(week) : '');
      try {
        const res = await fetch(url, { credentials:'include' });
        const json = await res.json();
        if (!json.ok) return alert('Error: ' + (json.msg||''));
        const data = JSON.stringify(json.data || [], null, 2);
        const blob = new Blob([data], { type: 'application/json' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `entregas${week ? '_semana'+week : ''}.json`;
        document.body.appendChild(link);
        link.click();
        link.remove();
      } catch (err) {
        console.error(err);
        alert('Error exportando.');
      }
    });
  }

  /* ----------------- Carga inicial ----------------- */
  loadSubmissions();
  // intenta cargar sección profesor si existe
  loadProfessorSubmissionsIfNeeded();
  // refresco periódico (opcional)
  setInterval(()=>{ if(document.hidden) return; loadSubmissions(); }, 30000);

  /* ----------------- Cerrar noticias (UI) ----------------- */
  document.querySelectorAll('.cv-notice-close').forEach(btn => {
    btn.addEventListener('click', () => {
      const n = btn.closest('.cv-notice');
      if (!n) return;
      n.style.transition = 'opacity .22s, height .28s, margin .22s';
      n.style.opacity = '0'; n.style.height = '0'; n.style.margin = '0';
      setTimeout(() => n.remove(), 300);
    });
  });

}); // DOMContentLoaded



function resolveUrl(path) {
  if (!path) return '';
  if (/^https?:\/\//i.test(path)) return path;
  // ajusta base según tu estructura (si tus archivos están en la raíz pública)
  return window.location.origin + '/' + path.replace(/^\/+/, '');
}
function fmtDate(iso) {
  try { return new Date(iso).toLocaleString(); } catch(e){ return iso; }
}
function esc(s){ if (s==null) return ''; return String(s).replace(/[&<>"']/g, m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }

/* ---------- RENDER: lista de entregas por semana (agrupado por alumno) ---------- */
async function loadWeekReceivedFor(weekEl) {
  const weekId = weekEl.dataset.week;
  const listEl = weekEl.querySelector('.cv-week-received .received-list');
  if (!listEl) return;
  listEl.innerHTML = 'Cargando...';

  try {
    const res = await fetch(`api_maestro.php?week=${encodeURIComponent(weekId)}`, { credentials: 'include' });
    const json = await res.json();
    if (!json.ok) {
      listEl.innerHTML = `<div class="err">Error: ${esc(json.msg || 'Respuesta inválida')}</div>`;
      return;
    }

    const rows = json.data || [];
    if (!rows.length) {
      listEl.innerHTML = `<div class="empty">No hay entregas para esta semana.</div>`;
      return;
    }

    // Agrupar por alumno (usuario_id)
    const groups = {};
    rows.forEach(r => {
      const uid = r.usuario_id ?? ('u_' + (r.usuario_nombre||'anon'));
      groups[uid] = groups[uid] || { usuario_id: r.usuario_id, usuario_nombre: r.usuario_nombre || 'Alumno', items: [] };
      groups[uid].items.push(r);
    });

    // Render
    listEl.innerHTML = '';
    Object.values(groups).forEach(g => {
      const acc = document.createElement('div');
      acc.className = 'student-accordion';
      const initials = (g.usuario_nombre || 'A').split(' ').map(x=>x[0]).slice(0,2).join('').toUpperCase();

      // Header
      acc.innerHTML = `
        <button class="student-accordion-btn" aria-expanded="false">
          <span class="avatar">${esc(initials)}</span>
          <span class="sname">${esc(g.usuario_nombre)}</span>
          <span class="count">${g.items.length}</span>
          <span class="chev">&#x25BE;</span>
        </button>
        <div class="student-accordion-body" hidden>
          <div class="student-submissions"></div>
        </div>
      `;

      // Llenar las entregas dentro del body
      const body = acc.querySelector('.student-accordion-body .student-submissions');
      g.items.forEach(it => {
        const fileUrl = resolveUrl(it.archivo || it.enlace || '');
        const titleHtml = (fileUrl ? `<a class="sub-link" href="${esc(fileUrl)}" target="_blank" rel="noopener">${esc(it.titulo)}</a>` : esc(it.titulo));
        const row = document.createElement('div');
        row.className = 'submission-row';
        row.dataset.submissionId = String(it.id);
        row.innerHTML = `
          <div class="sr-left">
            <div class="sr-title">${titleHtml}</div>
            <div class="sr-meta">${esc(it.tipo||'') } · ${fmtDate(it.creado_at)}</div>
          </div>
          <div class="sr-right">
            <span class="badge estado-${esc(it.estado||'pendiente')}">${esc(it.estado||'pendiente')}</span>
            <div class="sr-actions">
              <button class="btn btn-small btn-preview" data-id="${esc(it.id)}">Vista</button>
              ${ fileUrl ? `<a class="btn btn-small btn-download" href="${esc(fileUrl)}" target="_blank" rel="noopener" download>Descargar</a>` : '' }
              <div class="select-mark">
                <select class="mark-select" data-id="${esc(it.id)}">
                  <option value="enviado"${it.estado==='enviado'?' selected':''}>Enviado</option>
                  <option value="pendiente"${it.estado==='pendiente'?' selected':''}>Pendiente</option>
                  <option value="revisado"${it.estado==='revisado'?' selected':''}>Revisado</option>
                  <option value="rechazado"${it.estado==='rechazado'?' selected':''}>Rechazado</option>
                </select>
              </div>
              <button class="btn btn-small btn-grade" data-id="${esc(it.id)}">Calificar</button>
            </div>
          </div>
        `;
        body.appendChild(row);
      });

      // add event listener to header toggle
      const btn = acc.querySelector('.student-accordion-btn');
      const bodyEl = acc.querySelector('.student-accordion-body');
      btn.addEventListener('click', () => {
        const open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        bodyEl.hidden = open;
      });

      // append whole accordion to list
      listEl.appendChild(acc);
    });

    // Delegación de eventos: preview, mark, grade
    listEl.querySelectorAll('.btn-preview').forEach(b => {
      b.addEventListener('click', (ev) => {
        const id = ev.currentTarget.dataset.id;
        // Si tienes openDetail usa eso; si no abre una vista simple
        if (typeof window.openDetail === 'function') return window.openDetail(id);
        // fallback: abrir modal simple
        alert('Abrir detalle entrega ID: ' + id);
      });
    });

    // cambiar estado -> llama a api_maestro_update_submission.php
    listEl.querySelectorAll('.mark-select').forEach(sel => {
      sel.addEventListener('change', async (ev) => {
        const id = ev.currentTarget.dataset.id;
        const estado = ev.currentTarget.value;
        try {
          const fd = new URLSearchParams();
          fd.append('id', id);
          fd.append('estado', estado);
          const res = await fetch('api_maestro_update_submission.php', {
            method: 'POST',
            body: fd,
            credentials: 'include',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
          });
          const j = await res.json();
          if (!j.ok) throw new Error(j.msg || 'Error al actualizar');
          // actualizar badge visual
          const row = listEl.querySelector(`.submission-row[data-submission-id="${id}"]`);
          if (row) {
            const badge = row.querySelector('.badge');
            badge.textContent = estado;
            badge.className = 'badge estado-' + estado;
          }
        } catch (err) {
          console.error(err);
          alert('No se pudo actualizar estado: ' + (err.message||''));
        }
      });
    });

    // calificar (prompt simple). Para guardar en BD necesitas endpoint -> a futuro.
    listEl.querySelectorAll('.btn-grade').forEach(b => {
      b.addEventListener('click', async (ev) => {
        const id = ev.currentTarget.dataset.id;
        const grade = prompt('Ingrese calificación (ej. 15/20 o 8.5):');
        if (grade == null) return;
        // aquí puedes llamar a un endpoint para guardar calificación/comentario.
        // Mientras tanto actualizamos visualmente la fila:
        const row = listEl.querySelector(`.submission-row[data-submission-id="${id}"]`);
        if (row) {
          let meta = row.querySelector('.sr-meta');
          meta.textContent = (meta.textContent || '') + ' · Calificación: ' + esc(grade);
          alert('Calificación añadida visualmente. Implementa endpoint para guardar en servidor.');
        }
      });
    });

  } catch (err) {
    console.error(err);
    listEl.innerHTML = `<div class="err">Error cargando entregas.</div>`;
  }
}

/* ---------- CARGA INICIAL: todas las semanas que estén en DOM ---------- */
function loadAllWeeksReceived() {
  document.querySelectorAll('.cv-week').forEach(weekEl => {
    // si no hay sección de "cv-week-received" la ignoramos
    if (weekEl.querySelector('.cv-week-received')) {
      loadWeekReceivedFor(weekEl);
    }
  });
}

/* ---------- VISTA GLOBAL: lista en submissionsContainer (opcional) ---------- */
async function loadGlobalSubmissions() {
  const container = document.getElementById('submissionsContainer');
  if (!container) return;
  container.innerHTML = 'Cargando...';
  const week = (document.getElementById('filter-week') || {}).value || '';
  try {
    const res = await fetch('api_maestro.php' + (week ? '?week=' + encodeURIComponent(week) : ''), { credentials: 'include' });
    const j = await res.json();
    if (!j.ok) { container.innerHTML = `<div class="err">Error: ${esc(j.msg||'')}</div>`; return; }
    const rows = j.data || [];
    if (!rows.length) { container.innerHTML = '<div class="empty">No hay entregas.</div>'; return; }
    // construir lista simple
    const ul = document.createElement('ul');
    ul.className = 'submission-list';
    rows.forEach(r => {
      const li = document.createElement('li');
      li.innerHTML = `<strong>Semana ${esc(r.semana_id)}</strong> · ${esc(r.usuario_nombre)} — <a href="${esc(resolveUrl(r.archivo||r.enlace||''))}" target="_blank">${esc(r.titulo)}</a> <span class="badge estado-${esc(r.estado||'pendiente')}">${esc(r.estado||'pendiente')}</span>`;
      ul.appendChild(li);
    });
    container.innerHTML = '';
    container.appendChild(ul);
  } catch (err) {
    console.error(err);
    container.innerHTML = `<div class="err">Error cargando datos.</div>`;
  }
}

/* ---------- INIT ---------- */
document.addEventListener('DOMContentLoaded', () => {
  loadAllWeeksReceived();
  loadGlobalSubmissions();

  // boton de refrescar global (si existe)
  const btnRefresh = document.getElementById('btn-refresh');
  if (btnRefresh) {
    btnRefresh.addEventListener('click', () => {
      loadAllWeeksReceived();
      loadGlobalSubmissions();
    });
  }
// ============================================
//  Cargar entregas (para el profesor)
// ============================================
async function cargarEntregas(weekId = 0) {
  try {
    const url = weekId > 0 
      ? `api_maestro.php?week=${weekId}`
      : `api_maestro.php`;
    
    const res = await fetch(url);
    const data = await res.json();

    if (!data.ok) {
      console.error("Error en la respuesta:", data.msg);
      return;
    }

    // Donde se insertarán las entregas
const contenedor = document.querySelector(`.cv-week[data-week="${weekId}"] .submissions-list`);
    if (!contenedor) return;

    // Limpia entregas previas
    contenedor.innerHTML = "";

    // Si no hay entregas
    if (data.data.length === 0) {
      contenedor.innerHTML = `<p style="color:var(--muted);font-size:.9rem;">No hay entregas todavía.</p>`;
      return;
    }

    // Renderizar cada entrega
    data.data.forEach(ent => {
      const fecha = new Date(ent.creado_at).toLocaleDateString('es-ES', {
        day: '2-digit', month: 'short', year: 'numeric'
      });

      const icon = ent.tipo === "archivo" ? "fa-file-pdf" : "fa-link";
      const archivoUrl = ent.archivo ? ent.archivo : ent.enlace;
      const tipoTexto = ent.tipo === "archivo" ? "Archivo" : "Enlace";

      const card = document.createElement("div");
      card.className = "submission-card";
      card.innerHTML = `
        <div class="submission-info">
          <div class="submission-icon"><i class="fa-solid ${icon}"></i></div>
          <div class="submission-meta">
            <span class="name">${ent.usuario_nombre}</span>
            <span class="title">${ent.titulo} <span style="color:var(--muted);font-size:0.85rem;">(${tipoTexto})</span></span>
          </div>
        </div>

        <div class="submission-actions">
          <span class="submission-status ${ent.estado ?? "pendiente"}">${ent.estado ?? "pendiente"}</span>
          <span class="submission-date">${fecha}</span>
          <a href="${archivoUrl}" target="_blank" class="submission-btn secondary"><i class="fa-solid fa-eye"></i> Ver</a>
          ${ent.archivo ? `<a href="${archivoUrl}" download class="submission-btn"><i class="fa-solid fa-download"></i></a>` : ""}
        </div>
      `;
      contenedor.appendChild(card);
    });
  } catch (err) {
    console.error("Error cargando entregas:", err);
  }
}

// ============================================
//  Detectar apertura del bimestre o semana
//  para cargar las entregas automáticamente
// ============================================
document.addEventListener("DOMContentLoaded", () => {
  // Cada semana tiene un id único tipo "week-1"
  const semanas = document.querySelectorAll(".cv-week");

  semanas.forEach(week => {
    const toggle = week.querySelector(".cv-week-toggle");
    if (!toggle) return;

    toggle.addEventListener("click", () => {
      const weekId = parseInt(week.dataset.weekId || 0);
      if (week.classList.contains("open")) return; // ya abierta

      week.classList.add("open");
      // Cargar entregas reales
      cargarEntregas(weekId);
    });
  });
});

  // recarga automática cada X segundos (opcional)
  // setInterval(loadAllWeeksReceived, 30000);
});
</script>
<script>
/* ============================================================
   Script: Mostrar entregas de estudiantes en EPT Maestro
   Usa el diseño de .cv-week-received → .received-list
   Conecta con api_maestro.php
============================================================ */

async function cargarEntregasSemana(weekId) {
  const contenedor = document.querySelector(`.cv-week[data-week="${weekId}"] .received-list`);
  if (!contenedor) return;
  contenedor.innerHTML = "<p>Cargando entregas...</p>";

  try {
    const res = await fetch(`api_maestro.php?week=${weekId}`);
    const json = await res.json();

    if (!json.ok) {
      contenedor.innerHTML = `<p style="color:#b00;">Error: ${json.msg}</p>`;
      return;
    }

    const entregas = json.data || [];
    if (entregas.length === 0) {
      contenedor.innerHTML = `<p style="color:#777;">No hay entregas todavía.</p>`;
      return;
    }

    // Renderiza cada entrega con tu estilo (tarjetas)
    contenedor.innerHTML = "";
    entregas.forEach(e => {
      const fecha = new Date(e.creado_at).toLocaleDateString('es-ES', {
        day: '2-digit', month: 'short', year: 'numeric'
      });

      const icono = e.tipo === "archivo" ? "fa-file-pdf" : "fa-link";
      const enlace = e.archivo || e.enlace || "#";
      const estado = e.estado || "pendiente";
      const colorEstado =
        estado === "revisado" ? "#198754" :
        estado === "enviado"  ? "#ffc107" :
        "#6c757d";

      const card = document.createElement("div");
      card.className = "submission-card";
      card.innerHTML = `
        <div class="submission-info">
          <div class="submission-icon"><i class="fa-solid ${icono}"></i></div>
          <div class="submission-meta">
            <div class="submission-name">${e.usuario_nombre}</div>
            <div class="submission-title">${e.titulo}</div>
          </div>
        </div>

        <div class="submission-actions">
          <span class="submission-date">${fecha}</span>
          <span class="submission-status" style="background:${colorEstado};">${estado}</span>
          <a href="${enlace}" target="_blank" class="submission-btn secondary">
            <i class="fa-solid fa-eye"></i> Ver
          </a>
          ${e.archivo ? `<a href="${e.archivo}" download class="submission-btn"><i class="fa-solid fa-download"></i></a>` : ""}
        </div>
      `;

      contenedor.appendChild(card);
    });

  } catch (err) {
    console.error("Error al cargar entregas:", err);
    contenedor.innerHTML = `<p style="color:#b00;">Error de conexión</p>`;
  }
}

// Cargar entregas al abrir cada semana (solo una vez)
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".cv-week").forEach(week => {
    const toggle = week.querySelector(".cv-week-toggle");
    if (!toggle) return;

    toggle.addEventListener("click", () => {
      if (week.classList.contains("loaded")) return;
      week.classList.add("loaded");
      const weekId = week.dataset.week;
      cargarEntregasSemana(weekId);
    });
  });
});
</script>

</body>
</html>
