<?php
$host = "localhost";   // o 127.0.0.1
$db   = "jobclass";    // el nombre de tu base de datos
$user = "root";        // usuario de MySQL
$pass = "";            // contraseña (en XAMPP normalmente vacío)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
