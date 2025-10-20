<?php
// insertar_usuarios.php
require 'db.php';

// Lista de usuarios a crear (nombre, email, contraseña, rol)
$usuarios = [
    ["Carlos Gómez", "carlos@jobclass.com", "carlos123", "profesor"],
    ["Ana Torres", "ana@jobclass.com", "ana123", "estudiante"],
    ["Luis Ramírez", "luis@jobclass.com", "luis123", "estudiante"],

    // 🔹 Admin
    ["Admin General", "admin@jobclass.com", "admin123", "admin"],
];

foreach ($usuarios as $u) {
    [$nombre, $email, $clave, $rol] = $u;

    // Comprobar si ya existe
    $check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "⚠️ El usuario $email ya existe.<br>";
        $check->close();
        continue;
    }
    $check->close();

    // Crear hash y guardar
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);

    if ($stmt->execute()) {
        echo "✅ Usuario $nombre ($email) creado con rol: $rol y contraseña: $clave<br>";
    } else {
        echo "❌ Error al insertar $email: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
