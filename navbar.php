<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$logeado = !empty($_SESSION['usuario_id']);
$nombre  = $logeado ? $_SESSION['usuario_nombre'] : '';
$initial = $logeado && strlen($nombre) ? strtoupper(mb_substr($nombre, 0, 1)) : '';
?>
<header class="topbar">
  <div class="logo">
    <!-- Botón hamburguesa (abre sidebar en móvil) -->
    <button id="toggleSidebar" aria-label="Abrir menú" class="top-hamburger">
      <i class="fas fa-bars"></i>
    </button>
    JOB <span>class</span>
  </div>

  <nav class="topbar-menu" role="navigation" aria-label="Menú principal">
    <?php if ($logeado): ?>
      <div class="user-box" aria-live="polite">
        <div class="avatar" title="<?php echo htmlspecialchars($nombre); ?>">
          <?php echo htmlspecialchars($initial); ?>
        </div>
        <span class="user-name">
          Hola, <strong><?php echo htmlspecialchars($nombre); ?></strong>
        </span>
        <a href="logout.php" class="logout-btn" aria-label="Cerrar sesión">Salir</a>
      </div>
    <?php else: ?>
      <a href="login.php" class="login-btn" title="Iniciar sesión">👤</a>
    <?php endif; ?>
  </nav>
</header>

<style>/* ==== LAYOUT ==== */

/* ==== NAVBAR ==== */
.topbar {
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 22px;
  border-bottom: 1px solid #eef2f6;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1100; /* más alto que sidebar */
}

.topbar .logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  font-size: 1.25rem;
  color: #0d1b2a;
}
.topbar .logo span {
  color: #00c6ff;
  font-weight: 500;
  font-size: 1rem;
}

/* Menú usuario */
.topbar-menu {
  display: flex;
  align-items: center;
  gap: 14px;
}

.topbar-menu a {
  color: #0d1b2a;
  text-decoration: none;
  font-size: 0.95rem;
  padding: 6px 8px;
  border-radius: 8px;
  transition: 0.2s;
}
.topbar-menu a:hover {
  color: #0077ff;
  background: rgba(0,119,255,0.05);
}

/* Botón hamburguesa */
#toggleSidebar {
  display: none;
  background: transparent;
  border: none;
  font-size: 20px;
  cursor: pointer;
  color: #0d1b2a;
}

/* Avatar */
.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: #00a7ff;
  color: #fff;
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:700;
  box-shadow: 0 2px 6px rgba(0,0,0,0.12);
}

/* Usuario */
.user-box {
  display:flex;
  align-items:center;
  gap:10px;
}
.user-name {
  font-weight:600;
  color:#0d1b2a;
}

/* Botón salir */
.logout-btn {
  padding:6px 10px;
  border-radius:16px;
  background:#ff4d4d;
  color:#fff !important;
  text-decoration:none;
  font-size:0.85rem;
}
.logout-btn:hover {
  background:#e03b3b;
}

/* Botón login */
.login-btn {
  background: #00c6ff;
  color: white !important;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  font-weight: bold;
  transition: background 0.3s;
}
.login-btn:hover { background: #009fd6; }

/* ======= RESPONSIVE ======= */
@media (max-width: 900px) {
  #toggleSidebar { display: inline-block; }
  .topbar-menu .user-name { display: none; } /* ocultar texto, solo avatar en móvil */
}

</style>
  <nav class="topbar-menu" role="navigation" aria-label="Main menu">
 
    <?php if ($logeado): ?>
      <div class="user-box" aria-live="polite">
        <div class="avatar" title="<?php echo htmlspecialchars($nombre); ?>">
          <?php echo htmlspecialchars($initial); ?>
        </div>
        <span class="user-name">
          Hola, <strong><?php echo htmlspecialchars($nombre); ?></strong>
        </span>
        <a href="logout.php" class="logout-btn" aria-label="Cerrar sesión">Salir</a>
      </div>
    <?php else: ?>
      <a href="login.php" class="login-btn" title="Iniciar sesión">👤</a>
    <?php endif; ?>
  </nav>
</header>
<script src="script.js"></script>
