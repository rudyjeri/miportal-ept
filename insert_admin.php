<?php
require 'db.php';

$email  = 'admin@jobclass.com';
$nombre = 'Admin';
$plain  = 'admin123'; // ESTA será la contraseña

// Eliminar cualquier registro previo
$stmt = $conn->prepare("DELETE FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->close();

// Generar un hash nuevo y correcto
$hash = password_hash($plain, PASSWORD_DEFAULT);

// Insertar Admin
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $hash);
if ($stmt->execute()) {
    echo "✅ Usuario Admin creado con contraseña: $plain";
} else {
    echo "❌ Error: " . $stmt->error;
}
$stmt->close();
