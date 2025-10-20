<?php
// login.php
session_start();
require 'db.php'; // aquí ya tienes $conn con PDO

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = trim($_POST['password'] ?? '');

    if ($email === '' || $pass === '') {
        $error = "⚠️ Completa ambos campos.";
    } else {
        try {
            // Consulta con PDO
            $stmt = $conn->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($pass, $user['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['usuario_id']     = $user['id'];
                    $_SESSION['usuario_nombre'] = $user['nombre'];
                    $_SESSION['usuario_rol']    = $user['rol'];

                    // 🔹 Redirigir según rol
                    if ($user['rol'] === 'profesor') {
                        header("Location: index-maestro.php");
                    } elseif ($user['rol'] === 'estudiante') {
                        header("Location: index-estudiante.php");
                    } elseif ($user['rol'] === 'admin') {
                        header("Location: admin/index.php");
                    }
                    exit;
                } else {
                    $error = "❌ Contraseña incorrecta";
                }
            } else {
                $error = "⚠️ Usuario no encontrado";
            }
        } catch (PDOException $e) {
            $error = "Error en la consulta: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>

  <style>
    * { margin:0; padding:0; box-sizing:border-box; }

    body {
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      background-color: #0077ff;
      font-family:"Segoe UI", sans-serif;
    }

    .login-container {
      display:flex;
      width:850px;
      max-width:95%;
      height:500px;
      background-color: #2950fbff;
      border-radius:16px;
      overflow:hidden;
      box-shadow:0 12px 32px rgba(0,0,0,0.4);
    }

    /* Panel izquierdo */
    .login-form {
      flex:1;
      padding:50px 40px;
      display:flex;
      flex-direction:column;
      justify-content:center;
      background-color: #0021c6ff;
      color:#fff;
    }

    .login-form h2 {
      font-size:28px;
      margin-bottom:10px;
    }

    .login-form p {
      font-size:14px;
      color:#aaa;
      margin-bottom:30px;
    }

    label {
      font-size:14px;
      margin-bottom:6px;
      display:block;
      color:#ddd;
    }

  input {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border-radius: 8px;
  border: none;
  background-color: #fff; /* fondo blanco */
  color: #000;            /* texto negro */
  font-size: 15px;
}

input::placeholder {
  color: #666;  /* gris para el placeholder */
}

    button {
      padding:14px;
      width:100%;
      border:none;
      border-radius:8px;
      background-color: #f93a00ff;
      color:#fff;
      font-size:16px;
      cursor:pointer;
      transition:transform 0.2s ease;
    }

    button:hover { transform:scale(1.03); }

    .error {
      background-color: #0077ff;
      color:#b00020;
      padding:10px;
      border-radius:6px;
      margin-bottom:16px;
      font-size:14px;
      text-align:center;
    }

    /* Panel derecho */
   .login-visual {
  flex: 1;
  background: url("images/INSIGNIA JOB - NUEVO - 2025.png") no-repeat center center;
  background-size: cover; /* hace que la foto ocupe todo el espacio */
  border-radius: 0 12px 12px 0; /* esquinas redondeadas */
}


    .login-visual h1 {
      color:rgba(255,255,255,0.85);
      font-size:32px;
      text-align:center;
    }

    @keyframes gradientMove {
      0% { filter:hue-rotate(0deg); }
      100% { filter:hue-rotate(60deg); }
    }

    /* Responsive */
    @media(max-width:768px){
      .login-container {flex-direction:column; height:auto;}
      .login-visual {height:200px;}
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-form">
      <h2>Iniciar sesión</h2>
      <p>Introduce tus datos para acceder</p>

      <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form method="post">
        <label>Email</label>
        <input type="email" name="email" placeholder="Tu email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Tu contraseña" required>

        <button type="submit">Entrar</button>
      </form>
    </div>

    <div class="login-visual">
      <h1>Bienvenido</h1>
    </div>
  </div>
</body>
</html>

