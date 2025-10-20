<?php
// get_entregas.php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Solo profesor
if (!isset($_SESSION['usuario_id']) || ($_SESSION['usuario_rol'] ?? '') !== 'profesor') {
  echo json_encode(['ok'=>false,'msg'=>'No autorizado']); exit;
}

try {
  $pdo = new PDO("mysql:host=localhost;dbname=jobclass;charset=utf8mb4","root","",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
  ]);
} catch (Exception $e) {
  echo json_encode(['ok'=>false,'msg'=>'DB error: '.$e->getMessage()]); exit;
}

// Opcional: filtrar por semana concreta
$semana = isset($_GET['semana_id']) ? (int)$_GET['semana_id'] : 0;

// Consulta: entregas de las semanas de los cursos del profesor
$sql = "
SELECT s.id,s.titulo,s.tipo,s.archivo,s.enlace,s.usuario_nombre,s.estado,s.creado_at,w.nombre AS semana
FROM submissions s
JOIN semanas w ON w.id=s.semana_id
JOIN bimestres b ON b.id=w.bimestre_id
JOIN cursos c ON c.id=b.curso_id
WHERE c.profesor_id=:prof";

if ($semana>0) {
  $sql.=" AND s.semana_id=:semana";
}

$stmt=$pdo->prepare($sql);
$params=[':prof'=>$_SESSION['usuario_id']];
if ($semana>0) $params[':semana']=$semana;
$stmt->execute($params);

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['ok'=>true,'entregas'=>$data]);
