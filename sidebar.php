<!-- BOTÓN HAMBURGUESA EN NAVBAR -->
<button id="toggleSidebar" class="hamburger" aria-label="Abrir menú" aria-expanded="false" aria-controls="sidebar">
  <i class="fas fa-bars"></i>
</button>

<!-- SIDEBAR -->
<nav class="sidebar" id="sidebar" aria-label="Sidebar principal">
  <button class="close-sidebar" id="closeSidebar" aria-label="Cerrar sidebar">
    <i class="fas fa-times"></i>
  </button>

  <ul>
    <li><a href="index-estudiante.php"><i class="fas fa-home"></i><span class="text">Inicio</span></a></li>
    <li><a href="educación-para-el-trabajo.html"><i class="fas fa-book"></i><span class="text">Cursos</span></a></li>
    <li><a href="#"><i class="fas fa-calendar-alt"></i><span class="text">Calendario</span></a></li>
    <li><a href="#"><i class="fas fa-cog"></i><span class="text">Ajustes</span></a></li>
  </ul>
</nav>

<!-- BACKDROP PARA MÓVIL -->
<div class="sidebar-backdrop"></div>


<!-- BACKDROP (para móvil) -->
<div class="sidebar-backdrop"></div>

<!-- ===== CSS ===== -->
<style>
/* Variables */
/* Variables */
:root{
  --sidebar-top-offset: 60px;
  --sidebar-width: 80px;        /* ancho normal */
  --sidebar-collapsed-width: 60px; /* ancho colapsado */
  --sidebar-bg-start: #0a1931;
  --sidebar-bg-end: #142d4c;
  --sidebar-text: #cfe8ff;
  --sidebar-border: rgba(255,255,255,0.08);
  --transition-fast: 0.22s;
  --transition-mid: 0.32s;
  --z-sidebar: 999;
  --backdrop-z: 998;
}

/* Base */
.sidebar {
  position: fixed;
  top: var(--sidebar-top-offset);
  left: 0;
  bottom: 0;
  width: var(--sidebar-width);
  background: linear-gradient(180deg, var(--sidebar-bg-start), var(--sidebar-bg-end));
  color: #fff;
  padding: 16px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 20px;
  box-shadow: 2px 0 18px rgba(0, 0, 0, 0.25);
  transition: width var(--transition-mid) ease, transform var(--transition-mid) ease;
  z-index: var(--z-sidebar);
  overflow-y: auto;
  border-right: 1px solid var(--sidebar-border);
}

/* Desktop: collapsed */
.sidebar.collapsed {
  width: var(--sidebar-collapsed-width);
  align-items: center;
  padding: 16px 10px;
}

/* Links */
.sidebar ul { list-style: none; padding: 8px 2px; margin: 0; width: 100%; }
.sidebar ul li { margin: 8px 0; }
.sidebar ul li a {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  color: var(--sidebar-text);
  padding: 10px 14px;
  border-radius: 10px;
  transition: background var(--transition-fast) ease, transform var(--transition-fast) ease;
  width: calc(100% - 16px);
  box-sizing: border-box;
}
.sidebar.collapsed ul li a { flex-direction: column; align-items: center; padding: 8px 6px; }
.sidebar.collapsed ul li a i { margin-bottom: 6px; }
.sidebar.collapsed ul li a .text {
  font-size: 0.72rem;
  margin-top: 4px;
  max-width: 68px;
  text-align: center;
}
.sidebar ul li a i { font-size: 20px; line-height: 1; }
.sidebar ul li a .text { font-size: 0.95rem; }

/* Hover */
.sidebar ul li a:hover {
  background: rgba(255,255,255,0.06);
  color: #fff;
  transform: translateY(-2px);
}

/* Hamburger & close */
.hamburger { background: transparent; border: none; color: #fff; font-size: 20px; cursor: pointer; margin-bottom: 6px; }
.close-sidebar {
  display: none;
  position: absolute;
  top: 8px;
  right: 12px;
  font-size: 22px;
  background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
}

/* Desktop: espacio contenido */
@media (min-width: 901px) {
  .sidebar ~ .main-content { margin-left: var(--sidebar-width); transition: margin-left var(--transition-mid) ease; }
  .sidebar.collapsed ~ .main-content { margin-left: var(--sidebar-collapsed-width); }
}
 /* === SIDEBAR MODERNA === */
.sidebar {
  position: fixed;
  top: 60px;   /* se coloca debajo de la topbar */
  left: 0;
  bottom: 0;
  width: 80px; /* compacta por defecto */
  background: linear-gradient(180deg, #0a1931, #142d4c);
  color: #fff;
  padding: 16px 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  box-shadow: 2px 0 18px rgba(0, 0, 0, 0.25);
  transition: width 0.3s ease;
  z-index: 999;
  overflow-x: hidden;
  border-right: 1px solid rgba(255, 255, 255, 0.1);
}

/* Expandida */
.sidebar.expanded {
  width: 220px;
  align-items: flex-start;
  padding: 16px;
}

/* Logo opcional */
.logo-sidebar {
  font-weight: bold;
  font-size: 1.2rem;
  margin-bottom: 10px;
  color: #fff;
}
.logo-sidebar span {
  color: #00c4ff;
}

/* Lista */
.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
}
.sidebar ul li {
  margin: 10px 0;
}
.sidebar ul li a {
  display: flex;
  flex-direction: column; /* ícono arriba, texto debajo */
  align-items: center;
  text-decoration: none;
  color: #cfe8ff;
  padding: 10px 0;
  border-radius: 12px;
  transition: all 0.2s ease;
  position: relative;
}
.sidebar.expanded ul li a {
  flex-direction: row; /* en expandido ícono + texto al costado */
  gap: 12px;
  justify-content: flex-start;
  padding: 10px 14px;
}
.sidebar ul li a i {
  font-size: 22px;
  margin-bottom: 6px;
}
.sidebar.expanded ul li a i {
  margin-bottom: 0;
}
.sidebar ul li a .text {
  font-size: 0.85rem;
  display: block;
}
.sidebar:not(.expanded) ul li a .text {
  font-size: 0.7rem;
  margin-top: 4px;
}

/* Hover */
.sidebar ul li a:hover {
  background: rgba(255, 255, 255, 0.08);
  color: #fff;
  transform: translateY(-2px);
}

/* Botón hamburguesa */
.hamburger {
  background: transparent;
  border: none;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  margin-bottom: 14px;
  transition: transform 0.2s;
}
.hamburger:hover {
  transform: rotate(-90deg);
}

/* Cerrar en móvil */
.close-sidebar {
  display: none;
  position: absolute;
  top: 12px;
  right: 12px;
  font-size: 22px;
  background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
}

/* Mobile: off-canvas */
@media (max-width: 900px) {
  .sidebar {
    transform: translateX(-120%);
    width: var(--sidebar-width);
    align-items: flex-start;
    padding-top: 28px;
  }
  .sidebar.open { transform: translateX(0); }
  .close-sidebar { display: block; }
  body.sidebar-open { overflow: hidden; }
  .main-content { margin-left: 0 !important; }
}

/* Backdrop */
.sidebar-backdrop {
  position: fixed;
  inset: 0;
  background: rgba(2,6,23,0.45);
  z-index: var(--backdrop-z);
  opacity: 0;
  transition: opacity .18s ease;
  pointer-events: none;
}
.sidebar-backdrop.active { opacity: 1; pointer-events: auto; }
/* Responsive */
@media (max-width: 900px) {
  .sidebar {
    transform: translateX(-100%);
    width: 220px;
    align-items: flex-start;
  }
  .sidebar.open {
    transform: translateX(0);
  }
  .close-sidebar {
    display: block;
  }
  .main-content {
    margin-left: 0 !important;
  }
}


.sidebar.collapsed ~ .main-content {
  margin-left: 92px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 900px) {
  #toggleSidebar { display: inline-block; }

  .sidebar {
    transform: translateX(-100%);
    width: 240px;
    height: 100%;
  }
  .sidebar.open { transform: translateX(0); }
  .close-sidebar { display: block; }

  .main-content { margin-left: 0 !important; }
}
/* ==== Accordion ==== */
 .sidebar.expanded ~ .main-content {
  margin-left: 220px;
}

</style>

<script>
// === Sidebar Controller ===
(function () {
  const isMobile = () => window.innerWidth <= 900;
  const sidebar  = document.getElementById("sidebar");
  const toggleBtn= document.getElementById("toggleSidebar");
  const closeBtn = document.getElementById("closeSidebar");
  const backdrop = document.querySelector(".sidebar-backdrop");

  if (!sidebar) return;

  // abrir móvil
  const openMobile = () => {
    sidebar.classList.add("open");
    document.body.classList.add("sidebar-open");
    backdrop?.classList.add("active");
    toggleBtn?.setAttribute("aria-expanded", "true");
  };

  // cerrar móvil
  const closeMobile = () => {
    sidebar.classList.remove("open");
    document.body.classList.remove("sidebar-open");
    backdrop?.classList.remove("active");
    toggleBtn?.setAttribute("aria-expanded", "false");
  };

  // alternar en desktop
  const toggleDesktop = () => {
    sidebar.classList.toggle("collapsed");
    toggleBtn?.setAttribute("aria-expanded", sidebar.classList.contains("collapsed") ? "false" : "true");
  };

  // botón hamburguesa
  toggleBtn?.addEventListener("click", () => {
    if (isMobile()) {
      sidebar.classList.contains("open") ? closeMobile() : openMobile();
    } else {
      toggleDesktop();
    }
  });

  // botón X y backdrop
  closeBtn?.addEventListener("click", closeMobile);
  backdrop?.addEventListener("click", closeMobile);

  // ESC cerrar en móvil
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && isMobile() && sidebar.classList.contains("open")) {
      closeMobile();
    }
  });

  // resize handler
  window.addEventListener("resize", () => {
    if (!isMobile()) {
      closeMobile(); // cerrar móvil si estaba abierto
      sidebar.classList.remove("open");
      sidebar.setAttribute("aria-hidden", "false");
    } else {
      sidebar.classList.remove("collapsed"); // en móvil nunca colapsa
    }
  });

  // estado inicial
  sidebar.setAttribute("role", "navigation");
  sidebar.setAttribute("aria-hidden", isMobile() ? "true" : "false");
})();

 

</script>
