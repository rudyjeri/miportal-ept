<?php
// submit_material.php
session_start();
header('Content-Type: application/json; charset=utf-8');

// --- Sólo estudiantes ---
if (!isset($_SESSION['usuario_id']) || ($_SESSION['usuario_rol'] ?? '') !== 'estudiante') {
  echo json_encode(['ok'=>false,'msg'=>'Usuario no autorizado']);
  exit;
}

// --- Conexión DB ---
try {
  $pdo = new PDO("mysql:host=localhost;dbname=jobclass;charset=utf8mb4","root","",[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);
} catch (Exception $e) {
  echo json_encode(['ok'=>false,'msg'=>'DB error: '.$e->getMessage()]);
  exit;
}

// --- Recoger datos ---
$week_id = (int)($_POST['week_id'] ?? 0);
$title   = trim($_POST['title'] ?? '');
$type    = $_POST['type'] ?? 'archivo';

if ($week_id<=0 || $title==='') {
  echo json_encode(['ok'=>false,'msg'=>'Faltan datos obligatorios']);
  exit;
}

$archivoPath = null;
$enlace = null;

if ($type==='archivo') {
  if (empty($_FILES['file']) || $_FILES['file']['error']!==UPLOAD_ERR_OK) {
    echo json_encode(['ok'=>false,'msg'=>'Archivo no subido']);
    exit;
  }
  $f=$_FILES['file'];
  if ($f['size']>25*1024*1024) {
    echo json_encode(['ok'=>false,'msg'=>'Archivo excede 25MB']);
    exit;
  }
  $allowed=['pdf','doc','docx'];
  $ext=strtolower(pathinfo($f['name'],PATHINFO_EXTENSION));
  if (!in_array($ext,$allowed)) {
    echo json_encode(['ok'=>false,'msg'=>'Tipo de archivo no permitido']);
    exit;
  }
  $uploadDir=__DIR__.'/uploads';
  if (!is_dir($uploadDir)) mkdir($uploadDir,0755,true);
  $safe='sub_'.bin2hex(random_bytes(8)).'.'.$ext;
  $dest=$uploadDir.'/'.$safe;
  if (!move_uploaded_file($f['tmp_name'],$dest)) {
    echo json_encode(['ok'=>false,'msg'=>'Error guardando archivo']);
    exit;
  }
  $archivoPath='uploads/'.$safe;
} else {
  $urlRaw=trim($_POST['url']??'');
  $enlace=filter_var($urlRaw,FILTER_VALIDATE_URL)?$urlRaw:null;
  if(!$enlace){
    echo json_encode(['ok'=>false,'msg'=>'URL inválida']);
    exit;
  }
}

// --- Insertar en DB ---
$stmt=$pdo->prepare("INSERT INTO submissions
 (titulo,tipo,archivo,enlace,usuario_id,usuario_nombre,semana_id,estado,creado_at)
 VALUES(:t,:tipo,:archivo,:enlace,:uid,:uname,:semana,'enviado',NOW())");
$stmt->execute([
 ':t'=>$title,
 ':tipo'=>$type,
 ':archivo'=>$archivoPath,
 ':enlace'=>$enlace,
 ':uid'=>$_SESSION['usuario_id'],
 ':uname'=>$_SESSION['usuario_nombre'],
 ':semana'=>$week_id
]);
$id=$pdo->lastInsertId();

// URL completa para frontend
$scheme=(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'https':'http';
$host=$_SERVER['HTTP_HOST'];
$path=rtrim(dirname($_SERVER['SCRIPT_NAME']),'/\\');
$base=$scheme.'://'.$host.$path.'/';
$archivoUrl=$archivoPath?$base.$archivoPath:null;

echo json_encode([
 'ok'=>true,
 'msg'=>'Entrega enviada correctamente',
 'id'=>$id,
 'week_id'=>$week_id,
 'titulo'=>$title,
 'tipo'=>$type,
 'archivo'=>$archivoUrl,
 'enlace'=>$enlace
]);
exit;
