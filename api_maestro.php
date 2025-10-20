<?php
// api_maestro.php
session_start();
header('Content-Type: application/json; charset=utf-8');

// --- 1. Validar sesión y rol ---
if (!isset($_SESSION['usuario_id']) || !in_array($_SESSION['usuario_rol'] ?? '', ['profesor','admin'])) {
    echo json_encode(['ok'=>false,'msg'=>'Usuario no autorizado']); 
    exit;
}

// --- 2. Conexión a la base de datos ---
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=jobclass;charset=utf8mb4",
        "root", "", // ⚠️ Ajusta usuario/clave de tu BD
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    echo json_encode(['ok'=>false,'msg'=>'DB error: '.$e->getMessage()]); 
    exit;
}

// --- 3. Opcional: filtrar por semana ---
$weekFilter = isset($_GET['week']) ? (int)$_GET['week'] : 0;

// --- 4. Obtener todas las entregas ---
$sql = "
SELECT e.id,
       e.titulo,
       e.tipo,
       e.archivo,
       e.enlace,
       e.usuario_id,
       e.usuario_nombre,
       e.semana_id,
       e.estado,
       e.creado_at
FROM submissions e
WHERE 1
";
$params = [];

// Si quieres filtrar solo las entregas del profesor actual descomenta y usa:
// $sql .= " AND e.profesor_id = :profesor_id";
// $params[':profesor_id'] = $_SESSION['user_id'];

if ($weekFilter > 0) {
    $sql .= " AND e.semana_id = :week_id";
    $params[':week_id'] = $weekFilter;
}

$sql .= " ORDER BY e.creado_at DESC";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['ok'=>true,'data'=>$rows]);
    exit;
} catch (Exception $e) {
    echo json_encode(['ok'=>false,'msg'=>'Query error: '.$e->getMessage()]);
    exit;
}
