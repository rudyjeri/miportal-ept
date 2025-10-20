-- Crear base de datos
CREATE DATABASE IF NOT EXISTS jobclass CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE jobclass;
SELECT * FROM usuarios;


-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  rol ENUM('estudiante','profesor','admin') NOT NULL DEFAULT 'estudiante',
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE submissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  tipo ENUM('archivo','enlace') DEFAULT 'archivo',
  archivo VARCHAR(255),
  enlace VARCHAR(500),
  usuario_id INT,
  usuario_nombre VARCHAR(100),
  semana_id INT,
  estado VARCHAR(50),
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de cursos
CREATE TABLE IF NOT EXISTS cursos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  descripcion TEXT,
  profesor_id INT NOT NULL,
  FOREIGN KEY (profesor_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla de inscripción de estudiantes a cursos
CREATE TABLE IF NOT EXISTS inscripciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  curso_id INT NOT NULL,
  estudiante_id INT NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE,
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla de bimestres
CREATE TABLE IF NOT EXISTS bimestres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  curso_id INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE
);

-- Tabla de semanas
CREATE TABLE IF NOT EXISTS semanas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  bimestre_id INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  FOREIGN KEY (bimestre_id) REFERENCES bimestres(id) ON DELETE CASCADE
);

-- Material subido por profesor para cada semana
CREATE TABLE IF NOT EXISTS materiales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  semana_id INT NOT NULL,
  titulo VARCHAR(150) NOT NULL,
  tipo ENUM('pdf','url') DEFAULT 'pdf',
  archivo VARCHAR(255),      -- ruta del archivo PDF
  enlace TEXT,               -- URL externa si es tipo url
  creado_por INT NOT NULL,
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (semana_id) REFERENCES semanas(id) ON DELETE CASCADE,
  FOREIGN KEY (creado_por) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Entregas de estudiantes (suben su tarea / entrega)
CREATE TABLE IF NOT EXISTS entregas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  semana_id INT NOT NULL,
  estudiante_id INT NOT NULL,
  titulo VARCHAR(150) NOT NULL,
  archivo VARCHAR(255) NOT NULL,
  estado ENUM('enviado','revisado') DEFAULT 'enviado',
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (semana_id) REFERENCES semanas(id) ON DELETE CASCADE,
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Opcional: para mensajes/foros (si los quieres luego)
CREATE TABLE IF NOT EXISTS foros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  semana_id INT NOT NULL,
  usuario_id INT NOT NULL,
  mensaje TEXT,
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (semana_id) REFERENCES semanas(id) ON DELETE CASCADE,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
