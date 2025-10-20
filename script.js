// script.js - controla sidebar (colapsar en desktop / slide en móvil)
// Requisitos: elementos con ids: #toggleSidebar, #sidebar, #closeSidebar
(function () {
  if (window.__sidebar_script_loaded) return;
  window.__sidebar_script_loaded = true;

  const isMobile = () => window.innerWidth <= 900;
  const qs = (s) => document.querySelector(s);

  function initSidebar() {
    const toggleBtn = qs("#toggleSidebar");   // botón en navbar
    const sidebar   = qs("#sidebar");         // nav sidebar
    const closeBtn  = qs("#closeSidebar");    // botón X en móvil
    const backdrop  = qs(".sidebar-backdrop");// backdrop opcional

    if (!sidebar) return false;

    // --- Helpers ---
    const openMobile = () => {
      sidebar.classList.add("open");
      document.body.classList.add("sidebar-open");
      sidebar.setAttribute("aria-hidden", "false");
      if (toggleBtn) toggleBtn.setAttribute("aria-expanded", "true");
      if (backdrop) backdrop.classList.add("active");
    };

    const closeMobile = () => {
      sidebar.classList.remove("open");
      document.body.classList.remove("sidebar-open");
      sidebar.setAttribute("aria-hidden", "true");
      if (toggleBtn) toggleBtn.setAttribute("aria-expanded", "false");
      if (backdrop) backdrop.classList.remove("active");
    };

    const toggleHandler = () => {
      if (isMobile()) {
        sidebar.classList.contains("open") ? closeMobile() : openMobile();
      } else {
        sidebar.classList.toggle("collapsed");
        document.body.classList.toggle(
          "sidebar-collapsed",
          sidebar.classList.contains("collapsed")
        );
        if (toggleBtn) {
          toggleBtn.setAttribute(
            "aria-expanded",
            sidebar.classList.contains("collapsed") ? "false" : "true"
          );
        }
      }
    };

    // --- Toggle button ---
    if (toggleBtn && !toggleBtn.__sidebar_init) {
      toggleBtn.addEventListener("click", toggleHandler);
      toggleBtn.addEventListener("keydown", (e) => {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          toggleHandler();
        }
      });
      toggleBtn.setAttribute("aria-controls", "sidebar");
      toggleBtn.setAttribute(
        "aria-expanded",
        sidebar.classList.contains("open") ? "true" : "false"
      );
      toggleBtn.__sidebar_init = true;
    }

    // --- Close button (solo móvil) ---
    if (closeBtn && !closeBtn.__sidebar_init) {
      closeBtn.addEventListener("click", closeMobile);
      closeBtn.__sidebar_init = true;
    }

    // --- Backdrop (cerrar al hacer clic) ---
    if (backdrop && !backdrop.__sidebar_init) {
      backdrop.addEventListener("click", closeMobile);
      backdrop.__sidebar_init = true;
    }

    // --- Cerrar al hacer clic fuera (solo móvil) ---
    if (!document.__sidebar_outside) {
      document.addEventListener(
        "click",
        (e) => {
          if (!isMobile()) return;
          const target = e.target;
          if (
            !sidebar.contains(target) &&
            !(toggleBtn && toggleBtn.contains(target))
          ) {
            closeMobile();
          }
        },
        { passive: true }
      );
      document.__sidebar_outside = true;
    }

    // --- ESC para cerrar (solo móvil) ---
    if (!document.__sidebar_escape) {
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && isMobile() && sidebar.classList.contains("open")) {
          closeMobile();
        }
      });
      document.__sidebar_escape = true;
    }

    // --- Resize ---
    if (!window.__sidebar_resize) {
      let t;
      window.addEventListener("resize", () => {
        clearTimeout(t);
        t = setTimeout(() => {
          if (!isMobile() && sidebar.classList.contains("open")) {
            closeMobile(); // cerrar slide si vuelves a desktop
            sidebar.setAttribute("aria-hidden", "false");
          }
          if (toggleBtn) {
            toggleBtn.setAttribute(
              "aria-expanded",
              isMobile()
                ? "false"
                : sidebar.classList.contains("collapsed")
                ? "false"
                : "true"
            );
          }
        }, 120);
      });
      window.__sidebar_resize = true;
    }

    // --- ARIA inicial ---
    sidebar.setAttribute("role", "navigation");
    sidebar.setAttribute(
      "aria-hidden",
      isMobile()
        ? sidebar.classList.contains("open")
          ? "false"
          : "true"
        : "false"
    );

    return true;
  } // end initSidebar

  // auto-init cuando cargue el DOM
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initSidebar);
  } else {
    initSidebar();
  }

  // Exponer manualmente (útil si cargas HTML con fetch)
  window.initSidebar = initSidebar;
})();
