<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Selecciona tu Rol</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #001effff, #00c6ff);
      font-family: Arial, sans-serif;
      color: #fff;
    }
    .container { text-align: center; }
    h1 { margin-bottom: 30px; font-size: 2rem; }
    .options {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }
    .option {
      flex: 1;
      max-width: 250px;
      padding: 30px 20px;
      background: rgba(255,255,255,0.1);
      border-radius: 12px;
      text-decoration: none;
      color: #fff;
      font-size: 1.2rem;
      font-weight: bold;
      transition: transform 0.2s ease, background 0.2s ease;
    }
    .option i {
      font-size: 40px;
      margin-bottom: 15px;
      display: block;
    }
    .option:hover {
      background: rgba(255,255,255,0.25);
      transform: translateY(-5px);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Elige tu rol para iniciar sesión</h1>
    <div class="options">
      <a href="login.php?rol=estudiante" class="option">
        <i class="fas fa-user-graduate"></i>
        Soy Estudiante
      </a>
      <a href="login.php?rol=profesor" class="option">
        <i class="fas fa-chalkboard-teacher"></i>
        Soy Profesor
      </a>
    </div>
  </div>
</body>
</html>
