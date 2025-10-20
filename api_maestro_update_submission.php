<?php
// ept_maestro_update_submission.php
// Actualiza estado / calificacion / comentario de una entrega (POST).
// Requiere sesión con $_SESSION['usuario_id'] y $_SESSION['usuario_rol']
// Usa bd.php para la conexión ($conn PDO)

header('Content-Type: application/json; charset=utf-8');
session_start();

try {
    // incluir archivo de conexión (asegúrate que $conn es PDO)
    require_once __DIR__ . '/bd.php';
    if (!($conn instanceof PDO)) throw new Exception('Conexión BD inválida en bd.php');
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'msg' => 'Error de conexión (bd.php): ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    exit;
}

// Autorización
if (!isset($_SESSION['usuario_id']) || !in_array($_SESSION['usuario_rol'] ?? '', ['profesor','admin'], true)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'msg' => 'Usuario no autorizado'], JSON_UNESCAPED_UNICODE);
    exit;
}
$usuarioId = (int) $_SESSION['usuario_id'];
$usuarioRol = $_SESSION['usuario_rol'] ?? '';

// leer inputs (form-data POST)
$id = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : (isset($_POST['id']) ? (int) $_POST['id'] : 0);
$estado = isset($_POST['estado']) ? trim($_POST['estado']) : null;
$calificacion = isset($_POST['calificacion']) ? trim($_POST['calificacion']) : null;
$comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : null;

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'ID de entrega inválido'], JSON_UNESCAPED_UNICODE);
    exit;
}

// validaciones
$allowedEstados = ['enviado','pendiente','revisado','rechazado'];
if ($estado !== null && $estado !== '' && !in_array($estado, $allowedEstados, true)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'Estado inválido'], JSON_UNESCAPED_UNICODE);
    exit;
}
if ($calificacion !== null && mb_strlen($calificacion) > 100) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'Calificación demasiado larga'], JSON_UNESCAPED_UNICODE);
    exit;
}
if ($comentario !== null && mb_strlen($comentario) > 4000) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'Comentario demasiado largo'], JSON_UNESCAPED_UNICODE);
    exit;
}

try {
    // --- Asegurar que columnas opcionales existen (calificacion, comentario, revisado_por, revisado_en)
    $schema = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'submissions'")->fetchAll(PDO::FETCH_COLUMN);
    $cols = array_map('strtolower', $schema);

    $toAdd = [];
    if (!in_array('calificacion', $cols, true)) $toAdd[] = "ADD COLUMN calificacion VARCHAR(100) NULL";
    if (!in_array('comentario', $cols, true)) $toAdd[] = "ADD COLUMN comentario TEXT NULL";
    if (!in_array('revisado_por', $cols, true)) $toAdd[] = "ADD COLUMN revisado_por INT NULL";
    if (!in_array('revisado_en', $cols, true)) $toAdd[] = "ADD COLUMN revisado_en TIMESTAMP NULL";

    if (count($toAdd) > 0) {
        $alterSql = "ALTER TABLE submissions " . implode(", ", $toAdd);
        // ejecutar en bloque (si falla en versiones antiguas, lo atrapamos)
        try { $conn->exec($alterSql); } catch (Throwable $e) { /* no fatal, continuamos */ }
    }

    // --- Si profesor, verificar que la entrega pertenece a un curso suyo
    if ($usuarioRol === 'profesor') {
        $checkSql = "
            SELECT sub.id
            FROM submissions sub
            INNER JOIN semanas s ON s.id = sub.semana_id
            INNER JOIN bimestres b ON b.id = s.bimestre_id
            INNER JOIN cursos c ON c.id = b.curso_id
            WHERE sub.id = :sid AND c.profesor_id = :profesor_id
            LIMIT 1
        ";
        $chk = $conn->prepare($checkSql);
        $chk->execute([':sid' => $id, ':profesor_id' => $usuarioId]);
        if ($chk->rowCount() === 0) {
            http_response_code(403);
            echo json_encode(['ok' => false, 'msg' => 'No tiene permisos sobre esta entrega'], JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    // --- Construir UPDATE dinámico
    $sets = [];
    $params = [':id' => $id];

    if ($estado !== null && $estado !== '') { $sets[] = "estado = :estado"; $params[':estado'] = $estado; }
    if ($calificacion !== null) { $sets[] = "calificacion = :calificacion"; $params[':calificacion'] = $calificacion; }
    if ($comentario !== null) { $sets[] = "comentario = :comentario"; $params[':comentario'] = $comentario; }

    if (count($sets) === 0) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'msg' => 'Nada para actualizar'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sets[] = "revisado_por = :revisor";
    $params[':revisor'] = $usuarioId;
    $sets[] = "revisado_en = NOW()";

    $sql = "UPDATE submissions SET " . implode(", ", $sets) . " WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    // Recuperar fila actualizada
    $get = $conn->prepare("SELECT * FROM submissions WHERE id = :id LIMIT 1");
    $get->execute([':id' => $id]);
    $row = $get->fetch(PDO::FETCH_ASSOC);

    // preparar archivo_url
    if ($row) {
        if (!empty($row['archivo'])) {
            if (preg_match('#^https?://#i', $row['archivo'])) {
                $row['archivo_url'] = $row['archivo'];
            } else {
                $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
                $host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? 'localhost');
                $scriptPath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
                $baseUrl = $scheme . '://' . $host . $scriptPath . '/';
                $row['archivo_url'] = $baseUrl . ltrim($row['archivo'], '/');
            }
        } else $row['archivo_url'] = null;
    }

    echo json_encode(['ok' => true, 'msg' => 'Actualizado', 'submission' => $row], JSON_UNESCAPED_UNICODE);
    exit;

} catch (Throwable $e) {
    http_response_code(500);
    error_log('ept_maestro_update_submission error: ' . $e->getMessage());
    echo json_encode(['ok' => false, 'msg' => 'Error interno: ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    exit;
}
