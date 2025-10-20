<?php
// mark_reviewed.php
session_start();
header('Content-Type: application/json; charset=utf-8');

// --- 1. Validar sesión y rol ---
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['rol'] ?? '', ['profesor','admin'])) {
    echo json_encode(['ok'=>false,'msg'=>'Usuario no autorizado']); 
    exit;
}

// --- 2. Conexión a la base de datos ---
try {
    $pdo = new PDO(
        "mysql:host=DB_HOST;dbname=DB_NAME;charset=utf8mb4",
        "DB_USER","DB_PASS",
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    echo json_encode(['ok'=>false,'msg'=>'DB error: '.$e->getMessage()]); 
    exit;
}

// --- 3. Leer parámetros POST ---
$id     = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$action = $_POST['action'] ?? '';

if ($id <= 0 || !in_array($action,['mark','unmark'])) {
    echo json_encode(['ok'=>false,'msg'=>'Parámetros inválidos']); 
    exit;
}

// --- 4. Determinar nuevo estado ---
$newEstado = ($action === 'mark') ? 'revisado' : 'subido';

// --- 5. Actualizar en la BD ---
// Usa tu tabla real: submissions o entregas
$stmt = $pdo->prepare("UPDATE submissions SET estado=:estado WHERE id=:id");
$stmt->execute([
    ':estado'=>$newEstado,
    ':id'=>$id
]);

if ($stmt->rowCount() === 0) {
    echo json_encode(['ok'=>false,'msg'=>'Entrega no encontrada o sin cambios']);
    exit;
}

// --- 6. Responder ---
echo json_encode(['ok'=>true,'msg'=>'Estado actualizado','estado'=>$newEstado]);
exit;
