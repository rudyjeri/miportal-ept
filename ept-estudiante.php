
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Curso: Educación para el trabajo E.P.T.</title>

  <!-- Si tienes style.css mantenlo -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    :root{
      --bg: #f9f9fb;
      --card: #fff;
      --muted: #6b7280;
      --accent: #007bff;
      --accent-2: #0f3cf4;
      --success: #16a34a;
      --border: #e5e7eb;
      --shadow: 0 6px 18px rgba(2,6,23,0.04);
      --radius: 10px;
    }

    /* Base */
    body {
      font-family: "Segoe UI", Tahoma, sans-serif;
      background: var(--bg);
      color: #111827;
      margin: 0;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      line-height: 1.45;
    }
  .main-content {
      flex: 1;
      padding: 70px 70px 20px 100px;
    }
    /* Top bar / notices */
    .cv-topbar{
      background: var(--card);
      border-radius: var(--radius);
      padding:14px;
      display:flex;
      gap:12px;
      align-items:flex-start;
      justify-content:space-between;
      border:1px solid var(--border);
      box-shadow:var(--shadow);
      margin-bottom:16px;
    }
    .cv-topbar-notices{ display:flex; flex-direction:column; gap:10px; width:100%; }
    .cv-notice{
      display:flex; gap:12px; align-items:flex-start;
      background: linear-gradient(90deg,#f0f6ff 0,#fff 100%);
      border-left:4px solid var(--accent-2);
      padding:12px; border-radius:8px; border:1px solid rgba(15,60,244,0.05);
    }
    .cv-notice-muted{ background:#fbfbfd; border-left-color:#9ca3af; }
    .cv-notice-icon{ color:var(--accent-2); font-size:18px; margin-top:2px; }
    .cv-notice-text{ font-size:0.95rem; color:#0f1724; }
    .cv-notice-close{ background:none; border:0; font-size:18px; color:#9aa2b2; cursor:pointer; margin-left:auto; }

    /* Tabs */
      .cv-topbar-tabs {
      margin-top: 1rem;
      display: flex;
      gap: .5rem;
      border-bottom: 2px solid #e5e7eb;
    }
     .cv-tab {
      background: none;
      border: none;
      padding: .5rem 1rem;
      font-size: .95rem;
      cursor: pointer;
      border-bottom: 2px solid transparent;
      transition: all .2s ease;
    }
    .cv-tab[aria-selected="true"] {
      border-bottom-color: #3b82f6;
      font-weight: 600;
      color: #3b82f6;
    }
    .cv-tab:hover {
      color: #2563eb;
    }
    /* Acordeon (Información curso) */
    .cv-accordion { border:1px solid var(--border); border-radius:10px; background:var(--card); box-shadow:var(--shadow); overflow:hidden; margin-bottom:16px;}
    .cv-accordion-btn { width:100%; padding:12px 16px; background:none; border:0; text-align:left; cursor:pointer; display:flex; align-items:center; gap:8px; font-weight:700; }
    .cv-accordion-btn .chev { margin-left:auto; transition: transform .22s ease; color:var(--muted); }
    .cv-accordion.open .cv-accordion-btn .chev { transform: rotate(180deg); }
    .cv-accordion-content { padding:12px 16px; border-top:1px solid var(--border); display:none; color:var(--muted); }
    .cv-accordion.open .cv-accordion-content { display:block; }

    /* Bimestre */
    .cv-bimestre { border-top:3px solid var(--accent-2); border-radius:10px; background:var(--card); margin-bottom:20px; box-shadow:var(--shadow); overflow:hidden; }
    .cv-bimestre-head { padding:12px 16px; display:flex; align-items:center; gap:12px; cursor:pointer; background:linear-gradient(180deg,#0f3cf4 0,#0f3cf4 100%); color:#fff; font-weight:700; }
    .cv-bimestre-head .chev { margin-left:auto; transition: transform .22s ease; }
    .cv-bimestre.open .cv-bimestre-head .chev{ transform: rotate(180deg); }
    .cv-bimestre-body { max-height:0; overflow:hidden; transition: max-height .35s ease; background:#f9fafb; padding:0 0; }
    .cv-bimestre.open .cv-bimestre-body { max-height:2000px; padding:16px; } /* abre */

    /* Semana */
    .cv-week { background:var(--card); border:1px solid var(--border); border-radius:10px; margin-bottom:12px; overflow:hidden; box-shadow:0 4px 14px rgba(2,6,23,0.03); }
    .cv-week-header { display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:linear-gradient(180deg,#fbfdff,#f3f4f6); gap:10px; }
    .cv-week-toggle { background:none; border:0; display:flex; align-items:center; gap:10px; cursor:pointer; font-weight:700; color:#0f1724; }
    .cv-week-toggle .chev { color:var(--muted); transition: transform .22s; margin-left:auto; }
    .cv-week.open .cv-week-toggle .chev { transform: rotate(180deg); }
    .cv-week-body { padding:0 16px; max-height:0; overflow:hidden; transition:max-height .3s ease; }
    .cv-week.open .cv-week-body { padding:12px 16px; max-height:800px; }

    .cv-session { padding:8px 0; border-top:1px solid rgba(15,60,244,0.02); }
    .cv-session-title { font-weight:700; margin-bottom:8px; }

    /* Material rows */
    .cv-material-row { display:flex; align-items:center; justify-content:space-between; gap:12px; padding:10px 0; border-top:1px dashed rgba(0,0,0,0.04); }
    .cv-material-row:first-of-type { border-top:none; }
    .cv-left { display:flex; align-items:center; gap:12px; }
    .cv-icon { width:44px; height:44px; border-radius:8px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#eef6ff,#fff); color:var(--accent-2); font-size:18px; }
    .cv-meta { display:flex; flex-direction:column; }
    .cv-type { font-size:0.85rem; color:var(--muted); }
    .cv-title { font-weight:700; color:#0f1724; }

    .pill { padding:6px 10px; border-radius:9999px; font-size:0.82rem; display:inline-flex; align-items:center; gap:8px; }
    .pill.revisado { background:#d1fae5; color:#065f46; }
    .cv-due { color:var(--muted); font-size:0.9rem; min-width:110px; text-align:right; }

    /* Buttons */
    .add-material-btn, .student-upload-btn { background:var(--accent-2); color:#fff; border:0; padding:8px 12px; border-radius:8px; cursor:pointer; font-weight:700; display:inline-flex; gap:8px; align-items:center; }
    .student-upload-btn { background:var(--success); }
    .add-material-btn:hover, .student-upload-btn:hover { transform:translateY(-2px); }

    /* Panels for tabs */
    .panel { display:none; }
    .panel.active { display:block; }

    /* Forum / Tareas simple styles */
    .forum-list, .tasks-list { background:var(--card); border:1px solid var(--border); border-radius:8px; padding:12px; box-shadow:var(--shadow); }
    .forum-item, .task-item { padding:10px; border-bottom:1px solid #f3f6fb; display:flex; justify-content:space-between; align-items:center; gap:12px; }
    .forum-item:last-child, .task-item:last-child { border-bottom:0; }
    .forum-title { font-weight:700; }

    /* Modal */
    .modal { position:fixed; inset:0; display:none; align-items:center; justify-content:center; background:rgba(6,18,60,0.45); z-index:9999; padding:20px; }
    .modal.open { display:flex; }
    .modal-content { width:100%; max-width:640px; background:var(--card); padding:18px; border-radius:12px; box-shadow:0 20px 60px rgba(2,6,23,0.2); border:1px solid rgba(255,255,255,0.02); }
    .modal input[type="text"], .modal select, .modal input[type="file"], .modal input[type="url"] { width:100%; padding:10px; border-radius:8px; border:1px solid var(--border); -top:6px; }

    /* Noticias small tweak (uses same .cv-notice styles) */
    .news-section { margin-bottom:16px; }
    .news-header { font-weight:800; margin-bottom:8px; color:#0f1724; }
    .news-list { display:flex; flex-direction:column; gap:8px; }

    /* Responsive */
    @media (max-width:900px){
       .main-content{ padding:12px; }
      .cv-week-header{ flex-direction:column; align-items:flex-start; gap:8px; }
    }

    /* focus */ 
    button:focus, a:focus, input:focus, select:focus { outline:3px solid rgba(15,60,244,0.12); outline-offset:3px; border-radius:8px; }
  </style>
 
</head>
<body>

  <!-- Mantengo carga de navbar/sidebar (no quitar) -->
  <div id="navbar-container"></div>
  <div class="layout">
    <div id="sidebar-container"></div>

    <main class="main-content">

      <!-- Noticias -->
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
            <strong>Curso: Educación para el trabajo E.P.T.</strong>
            <div class="cv-topbar-tabs" role="tablist" aria-label="Pestañas del curso" style="margin-top:10px">
              <button class="cv-tab" data-panel="panel-contenido" aria-selected="true">Contenido</button>
              <button class="cv-tab" data-panel="panel-foros" aria-selected="false">Foros</button>
              <button class="cv-tab" data-panel="panel-tareas" aria-selected="false">Tareas</button>
            </div>
          </div>
        </div>

        <!-- Acordeón Info -->
        <div class="cv-accordion" id="courseInfo">
          <button class="cv-accordion-btn" aria-expanded="false">
            <i class="fas fa-info-circle"></i> Información del curso
            <span class="chev">&#x25BE;</span>
          </button>
          <div class="cv-accordion-content">
            <p><strong>Descripción:</strong> En este curso trabajaremos comprensión y redacción avanzada con enfoque práctico.</p>
          </div>
        </div>
      </div>

      <!-- Panels -->
      <section id="panel-contenido" class="panel active">
        <!-- Bimestre -->
        <div class="cv-bimestre" id="bim-3">
          <div class="cv-bimestre-head" role="button" tabindex="0" aria-expanded="false">
            Bimestre 3 <span class="chev">&#x25BE;</span>
          </div>

          <div class="cv-bimestre-body">
            <!-- Semana 1 -->
            <div class="cv-week" data-week="1">
              <div class="cv-week-header">
                <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 01 <span class="chev">&#x25BE;</span></button>
                <div>
                  <button class="student-upload-btn" type="button" data-week="1"><i class="fas fa-upload"></i> Subir entrega</button>
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
                  </div>

                  <div class="cv-week-append"></div>

                  <!-- SECCIÓN: Material recibido (entregas de estudiantes para esta semana) -->
                  <div class="cv-week-received">
                    <h4 class="received-title">Material recibido</h4>
                    <div class="received-list" data-week="1">Cargando...</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Semana 2 -->
            <div class="cv-week" data-week="2">
              <div class="cv-week-header">
                <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 02 <span class="chev">&#x25BE;</span></button>
                <div>
                  <button class="student-upload-btn" type="button" data-week="2"><i class="fas fa-upload"></i> Subir entrega</button>
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
                        <div class="cv-title">PPT_La recta en R2</div>
                      </div>
                    </div>
                    <div class="cv-due">Sin fecha límite</div>
                  </div>
                  <div class="cv-week-append"></div>

                  <div class="cv-week-received">
                    <h4 class="received-title">Material recibido</h4>
                    <div class="received-list" data-week="2">Cargando...</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Semana 3 -->
            <div class="cv-week" data-week="3">
              <div class="cv-week-header">
                <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 03 <span class="chev">&#x25BE;</span></button>
                <div>
                  <button class="student-upload-btn" type="button" data-week="3"><i class="fas fa-upload"></i> Subir entrega</button>
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
                        <div class="cv-title">PPT_Proyecto de aplicación de la recta</div>
                      </div>
                    </div>
                    <div class="cv-due">Sin fecha límite</div>
                  </div>
                  <div class="cv-week-append"></div>

                  <div class="cv-week-received">
                    <h4 class="received-title">Material recibido</h4>
                    <div class="received-list" data-week="3">Cargando...</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Semana 4 -->
            <div class="cv-week" data-week="4">
              <div class="cv-week-header">
                <button class="cv-week-toggle"><i class="fas fa-book-open"></i> Semana 04 <span class="chev">&#x25BE;</span></button>
                <div>
                  <button class="student-upload-btn" type="button" data-week="4"><i class="fas fa-upload"></i> Subir entrega</button>
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
                        <div class="cv-title">PPT_Ejemplo Semana 04</div>
                      </div>
                    </div>
                    <div class="cv-due">Sin fecha límite</div>
                  </div>
                  <div class="cv-week-append"></div>

                  <div class="cv-week-received">
                    <h4 class="received-title">Material recibido</h4>
                    <div class="received-list" data-week="4">Cargando...</div>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- /cv-bimestre-body -->
        </div><!-- /cv-bimestre -->
      </section>

      <!-- Foros y Tareas (sin cambios) -->
      <section id="panel-foros" class="panel" aria-hidden="true">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <h3 style="margin:0">Foros del curso</h3>
          <button class="add-material-btn" id="new-forum-thread"><i class="fas fa-plus"></i> Nuevo tema</button>
        </div>
        <div class="forum-list" id="forum-list">
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

  <!-- Modal profesor (si lo usas) -->
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

  <!-- SCRIPTS -->
  <script>
  // util
  function escapeHtml(s){ if(!s && s !== 0) return ''; return String(s).replace(/[&<>"']/g, m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
  function resolveUrl(path){ if(!path) return ''; if(/^https?:\/\//i.test(path)) return path; return window.location.origin + '/' + path.replace(/^\/+/,''); }
  function fmtDate(iso){ try{ return new Date(iso).toLocaleString(); }catch(e){ return iso; } }

  // carga navbar/sidebar (no quitar)
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
    // Tabs
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

    // Acordeon info
    const accordion = document.getElementById('courseInfo');
    if (accordion) {
      const accBtn = accordion.querySelector('.cv-accordion-btn');
      if (accBtn) accBtn.addEventListener('click', ()=> {
        accordion.classList.toggle('open');
        accBtn.setAttribute('aria-expanded', String(accordion.classList.contains('open')));
      });
    }

    // bimestres
    document.querySelectorAll('.cv-bimestre-head').forEach(head => {
      head.addEventListener('click', () => {
        const bim = head.closest('.cv-bimestre');
        if (!bim) return;
        bim.classList.toggle('open');
        const body = bim.querySelector('.cv-bimestre-body');
        if (bim.classList.contains('open')) { head.setAttribute('aria-expanded','true'); body.style.maxHeight = body.scrollHeight + 'px'; }
        else { head.setAttribute('aria-expanded','false'); body.style.maxHeight = null; }
      });
    });

    // semanas toggle
    document.querySelectorAll('.cv-week').forEach(week => {
      const toggle = week.querySelector('.cv-week-toggle');
      const body = week.querySelector('.cv-week-body');
      if (!toggle || !body) return;
      toggle.addEventListener('click', ()=> {
        week.classList.toggle('open');
        if (week.classList.contains('open')) body.style.maxHeight = body.scrollHeight + 'px';
        else body.style.maxHeight = null;
      });
    });

    // modales
    const stuModal = document.getElementById('studentUploadModal');
    const profModal = document.getElementById('profAddModal');
    const openModal = m => { if(!m) return; m.classList.add('open'); m.setAttribute('aria-hidden','false'); };
    const closeModal = m => { if(!m) return; m.classList.remove('open'); m.setAttribute('aria-hidden','true'); };

    // open student modal
    document.querySelectorAll('.student-upload-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const wk = btn.getAttribute('data-week') || '';
        const sti = document.getElementById('stu_week_id');
        if (sti) sti.value = wk;
        const title = document.getElementById('stu_title');
        if (title) title.value = '';
        const file = document.getElementById('stu_file');
        if (file) file.value = '';
        const url = document.getElementById('stu_url');
        if (url) url.value = '';
        const type = document.getElementById('stu_type');
        if (type) type.value = 'archivo';
        if (document.getElementById('stu_file_row')) document.getElementById('stu_file_row').style.display = '';
        if (document.getElementById('stu_url_row')) document.getElementById('stu_url_row').style.display = 'none';
        openModal(stuModal);
      });
    });

    // close modal buttons
    const stuCancel = document.getElementById('stu_cancel');
    if (stuCancel) stuCancel.addEventListener('click', ()=> closeModal(stuModal));
    const profCancel = document.getElementById('prof_cancel');
    if (profCancel) profCancel.addEventListener('click', ()=> closeModal(profModal));
    if (stuModal) stuModal.addEventListener('click', e => { if (e.target === stuModal) closeModal(stuModal); });
    if (profModal) profModal.addEventListener('click', e => { if (e.target === profModal) closeModal(profModal); });

    // tipo change
    const stuType = document.getElementById('stu_type');
    if (stuType) stuType.addEventListener('change', e => {
      const val = e.target.value;
      document.getElementById('stu_file_row').style.display = val === 'archivo' ? '' : 'none';
      document.getElementById('stu_url_row').style.display = val === 'enlace' ? '' : 'none';
    });

    // cerrar noticias
    document.querySelectorAll('.cv-notice-close').forEach(btn => {
      btn.addEventListener('click', ()=> {
        const n = btn.closest('.cv-notice');
        if (!n) return;
        n.style.transition = 'opacity .22s, height .28s, margin .22s';
        n.style.opacity = '0'; n.style.height = '0'; n.style.margin = '0';
        setTimeout(()=> n.remove(), 300);
      });
    });

    // SUBMIT student form -> submit_material.php
    const studentForm = document.getElementById('studentUploadForm');
    if (studentForm) {
      studentForm.addEventListener('submit', async (ev) => {
        ev.preventDefault();
        const title = (document.getElementById('stu_title') || {}).value?.trim() || '';
        const type = (document.getElementById('stu_type') || {}).value || 'archivo';
        const fileEl = document.getElementById('stu_file');
        const urlEl = document.getElementById('stu_url');
        const week = (document.getElementById('stu_week_id') || {}).value || '';

        if (!title) { alert('Ingresa un título'); return; }
        if (type === 'archivo' && (!fileEl || !fileEl.files.length)) { alert('Selecciona un archivo'); return; }
        if (type === 'enlace' && (!urlEl || !urlEl.value.trim())) { alert('Ingresa una URL'); return; }

        const fd = new FormData(studentForm);
        if (week && !fd.get('week_id')) fd.append('week_id', week);

        try {
          const resp = await fetch('submit_material.php', { method: 'POST', body: fd, credentials: 'include' });
          // verificar status
          if (!resp.ok) {
            const txt = await resp.text();
            console.error('submit_material.php error HTTP:', resp.status, txt);
            throw new Error('Error en servidor (ver consola)');
          }
          const json = await resp.json();
          if (!json.ok) throw new Error(json.msg || 'Error servidor');

          // añadir visualmente en la semana (si existe append)
          const targetWeek = json.week_id || week;
          const weekEl = document.querySelector('.cv-week[data-week="'+targetWeek+'"]');
          if (weekEl) {
            const append = weekEl.querySelector('.cv-week-append');
            if (append) {
              const div = document.createElement('div');
              div.className = 'cv-material-row';
              const url = json.archivo || json.enlace || '';
              const titleHtml = url ? `<a href="${escapeHtml(url)}" target="_blank" rel="noopener">${escapeHtml(json.titulo)}</a>` : escapeHtml(json.titulo);
              div.innerHTML = `<div class="cv-left"><div class="cv-icon">${json.tipo==='archivo'?'<i class="fas fa-file"></i>':'<i class="fas fa-link"></i>'}</div>
                <div class="cv-meta"><div class="cv-type">Entrega · ${escapeHtml(json.tipo)}</div><div class="cv-title">${titleHtml}</div></div></div>
                <div class="cv-due"><span class="pill" style="background:#fff3cd;color:#92400e">Enviado</span></div>`;
              append.prepend(div);
            }
            // abrir semana si está cerrada
            if (!weekEl.classList.contains('open')) {
              const toggle = weekEl.querySelector('.cv-week-toggle');
              if (toggle) toggle.click();
            }
          }

          closeModal(stuModal);
          alert('Entrega enviada correctamente.');
          // recargar lista de entregas del profesor para esa semana
          if (targetWeek) loadSubmissionsForWeek(targetWeek);

        } catch (err) {
          console.error('Error submit:', err);
          alert('Error al enviar: ' + (err.message || 'Revisa la consola'));
        }
      });
    }

    // carga inicial: pedir entregas por semana para mostrar en cada received-list
    document.querySelectorAll('.received-list').forEach(el => {
      const wk = el.getAttribute('data-week');
      if (wk) loadSubmissionsForWeek(wk);
    });

  }); // DOMContentLoaded

  // Función: carga entregas del profesor para una semana (consume api_maestro.php)
  async function loadSubmissionsForWeek(week) {
    const container = document.querySelector(`.received-list[data-week="${week}"]`);
    if (!container) return;
    container.innerHTML = 'Cargando...';

    try {
      const resp = await fetch('api_maestro.php?week=' + encodeURIComponent(week), { credentials: 'include' });
      if (!resp.ok) {
        const t = await resp.text();
        console.error('api_maestro.php HTTP error:', resp.status, t);
        container.innerHTML = '<div class="small" style="color:var(--muted)">Error al cargar entregas</div>';
        return;
      }
      const json = await resp.json();
      if (!json.ok) {
        console.error('api_maestro.php json error:', json);
        container.innerHTML = '<div class="small" style="color:var(--muted)">No autorizado o error</div>';
        return;
      }

      const rows = Array.isArray(json.data) ? json.data : [];
      if (!rows.length) {
        container.innerHTML = '<div class="small" style="color:var(--muted)">Aún no hay entregas.</div>';
        return;
      }

      // render simple: cada entrega por alumno
      container.innerHTML = '';
      // agrupar por usuario_id
      const grouped = {};
      rows.forEach(r => {
        const uid = r.usuario_id ?? ('anon_' + (r.usuario_nombre||'sin-nombre'));
        grouped[uid] = grouped[uid] || { nombre: r.usuario_nombre || 'Alumno', items: [] };
        grouped[uid].items.push(r);
      });

      Object.values(grouped).forEach(g => {
        const wrapper = document.createElement('div');
        wrapper.className = 'student-card';
        // usando solo primera entrega para avatar y nombre (lista interna para detalles)
        const itemsHtml = g.items.map(it => {
          const fileUrl = it.archivo ? resolveUrl(it.archivo) : (it.enlace ? it.enlace : '');
          const linkHtml = fileUrl ? `<a href="${escapeHtml(fileUrl)}" target="_blank" rel="noopener">${escapeHtml(it.titulo)}</a>` : escapeHtml(it.titulo);
          return `<div style="display:flex;justify-content:space-between;gap:8px;align-items:center;margin-top:6px">
                    <div>
                      <div class="small">${linkHtml}</div>
                      <div class="small" style="color:var(--muted)">${escapeHtml(it.tipo)} · ${fmtDate(it.creado_at)}</div>
                    </div>
                    <div style="display:flex;gap:6px;align-items:center">
                      ${ it.archivo ? `<a class="btn small" href="${escapeHtml(resolveUrl(it.archivo))}" target="_blank" rel="noopener" download>Descargar</a>` : '' }
                      ${ it.enlace ? `<a class="btn small" href="${escapeHtml(it.enlace)}" target="_blank" rel="noopener">Abrir</a>` : '' }
                    </div>
                  </div>`;
        }).join('');

        const initials = (g.nombre || 'A').split(' ').map(x=>x[0]||'').slice(0,2).join('').toUpperCase();
        wrapper.innerHTML = `<div style="display:flex;gap:10px;align-items:flex-start;width:100%">
          <div class="student-avatar">${escapeHtml(initials)}</div>
          <div style="flex:1">
            <div style="font-weight:700">${escapeHtml(g.nombre)}</div>
            <div>${itemsHtml}</div>
          </div>
        </div>`;
        container.appendChild(wrapper);
      });

    } catch (err) {
      console.error('loadSubmissionsForWeek error', err);
      container.innerHTML = '<div class="small" style="color:var(--muted)">Error al cargar entregas (ver consola)</div>';
    }
  }
  </script>
</body>
</html>
