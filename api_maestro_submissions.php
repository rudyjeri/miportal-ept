<?php
// ept_maestro_submissions.php
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');

// Permiso: profesor o admin
if (!isset($_SESSION['usuario_id']) || !in_array($_SESSION['usuario_rol'] ?? '', ['profesor','admin'])) {
    echo json_encode(['ok' => false, 'msg' => 'Usuario no autorizado'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    exit;
}
$usuarioId = (int) $_SESSION['usuario_id'];
$usuarioRol = $_SESSION['usuario_rol'] ?? '';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=jobclass;charset=utf8mb4","root","",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'DB error: '.$e->getMessage()], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    exit;
}

// Parámetros: week opcional, limit/offset opcionales para paginación
$week = isset($_GET['week']) && is_numeric($_GET['week']) ? (int)$_GET['week'] : 0;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 0;
$offset = isset($_GET['offset']) && is_numeric($_GET['offset']) ? (int)$_GET['offset'] : 0;

// Construimos base url para devolver enlaces completos a archivos
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? 'localhost');
$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$baseUrl = $scheme . '://' . $host . $path . '/';

try {
    $params = [];
    $sql = '';

    if ($usuarioRol === 'profesor') {
        // Si es profesor, limitamos a sus cursos (semanas->bimestres->cursos->profesor_id)
        if ($week > 0) {
            $sql = "
              SELECT sub.*
              FROM submissions sub
              INNER JOIN semanas s ON s.id = sub.semana_id
              INNER JOIN bimestres b ON b.id = s.bimestre_id
              INNER JOIN cursos c ON c.id = b.curso_id
              WHERE sub.semana_id = :week AND c.profesor_id = :profesor_id
              ORDER BY sub.creado_at DESC
            ";
            $params[':week'] = $week;
            $params[':profesor_id'] = $usuarioId;
        } else {
            // Todas las entregas de los cursos que dicta el profesor
            $sql = "
              SELECT sub.*
              FROM submissions sub
              INNER JOIN semanas s ON s.id = sub.semana_id
              INNER JOIN bimestres b ON b.id = s.bimestre_id
              INNER JOIN cursos c ON c.id = b.curso_id
              WHERE c.profesor_id = :profesor_id
              ORDER BY sub.creado_at DESC
            ";
            $params[':profesor_id'] = $usuarioId;
        }
    } else {
        // admin: puede ver todo, con o sin filtro de semana
        if ($week > 0) {
            $sql = "SELECT * FROM submissions WHERE semana_id = :week ORDER BY creado_at DESC";
            $params[':week'] = $week;
        } else {
            $sql = "SELECT * FROM submissions ORDER BY creado_at DESC";
        }
    }

    // Añadir límite si fue solicitado (evitar retornos gigantes)
    if ($limit > 0) {
        $sql .= " LIMIT :limit";
        $params[':limit'] = $limit;
        if ($offset > 0) {
            $sql .= " OFFSET :offset";
            $params[':offset'] = $offset;
        }
        // Para que PDO bindParam funcione con limit/offset (enteros), los pasaremos como PDO::PARAM_INT más abajo
        $stmt = $pdo->prepare($sql);
        // bind params dinamicamente
        foreach ($params as $k => $v) {
            if (in_array($k, [':limit', ':offset'], true)) {
                $stmt->bindValue($k, (int)$v, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($k, $v);
            }
        }
        $stmt->execute();
    } else {
        // sin limit
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) $rows = [];

    // mapear archivos a URL completas y normalizar campos para el frontend
    foreach ($rows as &$r) {
        // archivo -> archivo_url
        $r['archivo_url'] = null;
        if (!empty($r['archivo'])) {
            if (preg_match('#^https?://#i', $r['archivo'])) {
                $r['archivo_url'] = $r['archivo'];
            } else {
                $r['archivo_url'] = $baseUrl . ltrim($r['archivo'], '/');
            }
        }
        // Si ya existe 'enlace' y es relativo no lo modificamos (front debe manejar)
        $r['enlace_url'] = null;
        if (!empty($r['enlace'])) {
            // si es URL absoluta, usarla; si no, intentar resolver como relativo
            if (preg_match('#^https?://#i', $r['enlace'])) {
                $r['enlace_url'] = $r['enlace'];
            } else {
                $r['enlace_url'] = $baseUrl . ltrim($r['enlace'], '/');
            }
        }
        // garantia: poner valores por defecto para claves usadas en front
        if (!isset($r['estado'])) $r['estado'] = null;
        if (!isset($r['calificacion'])) $r['calificacion'] = null;
        if (!isset($r['comentario'])) $r['comentario'] = null;
    }
    unset($r);

    echo json_encode(['ok' => true, 'data' => $rows], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    exit;
} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Query error: '.$e->getMessage()], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    exit;
}
