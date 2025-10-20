
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
$nombre = $_SESSION['usuario_nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Cursos - Plataforma</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <div id="navbar-container"></div>

  <div class="layout">
    <!-- Sidebar -->
    <div id="sidebar-container"></div>

    <!-- Contenido principal -->
    <main class="main-content">
<style>
  body {
  font-family: Arial, sans-serif;
  background: #ffffffff;
  color: #333;
}
/* Encabezado de cursos */
.courses-header {
  margin: 25px 0;
  text-align: left;
}

.courses-header h2 {
  font-size: 2rem;
  margin: 0;
} 
.courses-header small {
  font-size: 0.95rem;
  color: #312f2f;
}

.courses-header hr {
  border: none;
  border-top: 2px solid #ddd;
  margin-top: 10px;
}

/* BANNER / CARRUSEL */
.banner {
  position: relative;
  width: 100%;
  max-width: 1000px;
  height: 200px;
  margin: 15px auto;
  overflow: hidden;
  border-radius: 16px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.15);
  background: #ddd;
  margin-right: 47px;
}
.banner .carousel {
  display:flex;
  height:100%;
  transition: transform 0.6s cubic-bezier(.2,.8,.2,1);
  will-change: transform;
}
.banner .carousel img {
  flex: 0 0 100%;
  width: 100%;
  height: 100%;
  object-fit: cover;
  display:block;
}
.banner .control {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 8;
  background: rgba(0,0,0,0.45);
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  color: #fff;
  font-size: 18px;
  display: grid;
  place-items: center;
  cursor: pointer;
}
.banner .prev { left: 12px; }
.banner .next { right: 12px; }
.banner .dots { position: absolute; left: 50%; transform: translateX(-50%); bottom: 10px; display:flex; gap:8px; z-index:9; }
.banner .dots button { width:10px; height:10px; border-radius:50%; border:none; background: rgba(255,255,255,0.6); cursor:pointer; padding:0; }
.banner .dots button.active { background: white; box-shadow:0 0 0 4px rgba(255,255,255,0.08); }
/* Responsivo */

/* RESPONSIVO */
@media (max-width: 1024px) {
  .banner {
    width: 90%;
    max-width: 600px;
    height: 250px;
  }
}

@media (max-width: 768px) {
  .banner {
    width: 95%;
    max-width: 100%;
    height: 200px;
  }
}

@media (max-width: 480px) {
  .banner {
    width: 100%;
    height: 150px;
  }
  .banner .control {
    width: 30px;
    height: 30px;
    font-size: 16px;
  }
}
/* ==== SECCIONES (dos columnas) ==== */
.content-sections {
  display: grid;
  grid-template-columns: 3fr 1fr;
  gap: 20px;
}

/* ==== CURSOS (tarjetas) ==== */
.courses {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 32px;
}

.course-card {
  background: white;
  border-radius: 12px;
  padding: 15px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  text-decoration: none;
  color: inherit;
  display: flex;
  flex-direction: column;
  transition: transform 0.2s, box-shadow 0.2s;
}

.course-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.course-card img {
  width: 100%;
  border-radius: 8px;
  margin-bottom: 10px;
}

.course-card h3 {
  font-size: 18px;
  margin-bottom: 5px;
}

.course-card p {
  font-size: 14px;
  color: #666;
}

.course-card .progress {
  margin-top: 10px;
  display: inline-block;
  background: #0077ff;
  color: white;
  padding: 3px 8px;
  border-radius: 8px;
  font-size: 13px;
  align-self: flex-start;
}/* Contenedor centrado */
.container 
{
  margin-right: 180px; /* ajusta este valor */
  max-width: 700px;   /* ancho máximo (ajústalo a gusto) */
  margin: 0 auto;      /* centra horizontalmente */
  padding: 0 10px;     /* espacio a los lados en pantallas pequeñas */
}

/* ==== WEEKS (tarjetas de semanas) ==== */
.weeks {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
  margin-top: 15px;
}

.week {
  background: white;
  border-radius: 12px;
  padding: 15px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: transform 0.2s, box-shadow 0.2s;
}

.week:hover {
  transform: translateY(-4px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.week h3 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #0077ff;
}

.week ul {
  list-style: none;
}

.week ul li {
  margin-bottom: 10px;
}

.week ul li a {
  text-decoration: none;
  color: #333;
  font-size: 14px;
  display: block;
  padding: 6px 10px;
  border-radius: 8px;
  transition: background 0.2s, color 0.2s;
}

.week ul li a:hover {
  background: #0077ff;
  color: white;
}/* ==== Accordion ==== */
/* ==== Accordion ==== */
.accordion {
  background: #fff;
  border-radius: 12px;
  margin-bottom: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  overflow: hidden;
  transition: box-shadow 0.3s ease;
}

.accordion:hover {
  box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

.accordion-btn {
  background: #0d1b2a;
  color: #fff;
  cursor: pointer;
  padding: 16px 20px;
  border: none;
  outline: none;
  width: 100%;
  text-align: left;
  font-size: 17px;
  font-weight: 600;
  transition: background 0.3s, padding-left 0.3s;
  display: flex;
  align-items: center;
  gap: 10px;
}

.accordion-btn.active,
.accordion-btn:hover {
  background: #0077ff;
  padding-left: 28px; /* efecto visual al pasar */
}

.accordion-content {
  padding: 0 20px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.35s ease, padding 0.3s;
  background: #fafafa;
}

.accordion-content.open {
  padding: 12px 20px 16px;
}

.accordion-content ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.accordion-content li {
  padding: 8px 0;
  font-size: 15px;
  border-bottom: 1px solid #eee;
}

.accordion-content li:last-child {
  border-bottom: none;
}

.accordion-content a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
  transition: color 0.2s, padding-left 0.2s;
}

.accordion-content a:hover {
  color: #0077ff;
  padding-left: 6px;
}

/* ==== ACTIVIDADES ==== */
.activities {
  background: #fff;
  padding: 18px 20px;
  border-radius: 14px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.activities:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

.activities h3 {
  font-size: 19px;
  margin-bottom: 14px;
  color: #0077ff;
  font-weight: 600;
  border-bottom: 2px solid #0077ff;
  padding-bottom: 6px;
}

.activities ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.activities ul li {
  margin-bottom: 14px;
  font-size: 15px;
  border-bottom: 1px solid #f0f0f0;
  padding-bottom: 10px;
  line-height: 1.4;
}

.activities ul li strong {
  display: block;
  color: #222;
  font-weight: 600;
  margin-bottom: 2px;
}

.activities ul li small {
  color: #666;
  font-size: 13px;
}</style>
      <!-- Banner / Carrusel -->
      <div class="banner">
        <div class="carousel">
          <img src="images/joseola.jpg" alt="Talleres y tutorías">
          <img src="images/ciencias-de-la-computacion.jpg" alt="Segunda imagen">
          <img src="images/joseola.jpg" alt="Tercera imagen">
        </div>
        <!-- Controles -->
        <button class="control prev">&#10094;</button>
        <button class="control next">&#10095;</button>
      </div>

      <!-- Contenido en dos columnas -->
      <div class="content-sections">
        <!-- Cursos -->
        <div class="container">
          <div class="courses-header">
            <h2>Mis Áreas</h2>
            <small>2025 · 3. Bimestre</small>
            <hr>
          </div>

          <div class="courses">
            <a href="ept-maestro.php" class="course-card">
              <img src="images/afbc5862-ee1a-4f7a-99fc-e80143dad1cd.jpeg" alt="Curso 1">
              <h3>Educación para el Trabajo - EPT</h3>
              <p>Docente</p>
              <span class="progress">70%</span>
            </a>

            <a href="curso2.html" class="course-card">
              <img src="images/ciencias-de-la-computacion.jpg" alt="Curso 2">
              <h3>Matemática </h3>
              <p>Docente</p>
              <span class="progress">74%</span>
            </a>

            <a href="curso3.html" class="course-card">
              <img src="images/ciencias-de-la-computacion.jpg" alt="Curso 3">
              <h3>Comunicación </h3>
              <p>Docente</p>
              <span class="progress">60%</span>
            </a>
          </div>
        </div>

        <!-- Actividades -->
        <aside class="activities">
          <h3>Actividades semanales</h3>
          <ul>
            <li>
              <strong>Tarea no calificada</strong><br>
              <span>Comprensión y Redacción de Textos II</span><br>
              <small>Vencida - 22/07/2025</small>
            </li>
            <li>
              <strong>Evaluación no calificada</strong><br>
              <span>Inglés III</span><br>
              <small>Vencida - 22/07/2025</small>
            </li>
          </ul>
        </aside>
      </div>
    </main>
  </div>

  <!-- Scripts -->
  <script>
    async function loadComponent(id, file, callback) {
      const response = await fetch(file);
      const text = await response.text();
      document.getElementById(id).innerHTML = text;
      if (typeof callback === "function") callback();
    }

    loadComponent("navbar-container", "navbar.php");
    loadComponent("sidebar-container", "sidebar.php", () => { if(window.initSidebar) window.initSidebar(); });

    // Carrusel
    const carousel = document.querySelector('.carousel');
    const images = document.querySelectorAll('.carousel img');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let index = 0;

    function showImage() {
      carousel.style.transform = `translateX(-${index * 100}%)`;
    }

    prevBtn.addEventListener('click', () => {
      index = (index > 0) ? index - 1 : images.length - 1;
      showImage();
    });

    nextBtn.addEventListener('click', () => {
      index = (index + 1) % images.length;
      showImage();
    });

    setInterval(() => {
      index = (index + 1) % images.length;
      showImage();
    }, 10000);
  </script>

  <script src="script.js"></script>
</body>
</html>
