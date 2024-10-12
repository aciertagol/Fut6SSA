-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS liga_fut6ssa;

USE liga_fut6ssa;

-- Tabla: usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM(
        'usuario',
        'admin',
        'superusuario'
    ) DEFAULT 'usuario',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: equipos
CREATE TABLE IF NOT EXISTS equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    imagen_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: jornadas
CREATE TABLE IF NOT EXISTS jornadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_local VARCHAR(100) NOT NULL,
    equipo_visitante VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    resultado VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: estadisticas
CREATE TABLE IF NOT EXISTS estadisticas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_id INT,
    victorias INT DEFAULT 0,
    empates INT DEFAULT 0,
    derrotas INT DEFAULT 0,
    puntos INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipo_id) REFERENCES equipos (id) ON DELETE CASCADE
);

-- Tabla: videos
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    url_video VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: carrusel
CREATE TABLE IF NOT EXISTS carrusel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen_url VARCHAR(255) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: patrocinadores
CREATE TABLE IF NOT EXISTS patrocinadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    enlace VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo en la tabla usuarios
INSERT INTO
    usuarios (nombre, email, password, rol)
VALUES (
        'Administrador',
        'admin@ligafut6ssa.com',
        '$2y$10$uF4Rz6FYgSlbgSKc3bQiZuFNUoHpEF8kg6wR8K.QS8.Z7JnSCFZxW',
        'admin'
    ),
    (
        'Super Usuario',
        'superadmin@ligafut6ssa.com',
        '$2y$10$uF4Rz6FYgSlbgSKc3bQiZuFNUoHpEF8kg6wR8K.QS8.Z7JnSCFZxW',
        'superusuario'
    );

-- Insertar datos de ejemplo en la tabla equipos
INSERT INTO
    equipos (
        nombre,
        descripcion,
        imagen_url
    )
VALUES (
        'Equipo A',
        'Equipo fuerte de la liga',
        'https://miweb.com/equipoA.png'
    ),
    (
        'Equipo B',
        'Equipo con gran potencial',
        'https://miweb.com/equipoB.png'
    );

-- Insertar datos de ejemplo en la tabla jornadas
INSERT INTO
    jornadas (
        equipo_local,
        equipo_visitante,
        fecha,
        resultado
    )
VALUES (
        'Equipo A',
        'Equipo B',
        '2024-10-15',
        '2-1'
    );

-- Insertar datos de ejemplo en la tabla estadisticas
INSERT INTO
    estadisticas (
        equipo_id,
        victorias,
        empates,
        derrotas,
        puntos
    )
VALUES (1, 3, 1, 0, 10), -- Equipo A
    (2, 2, 1, 1, 7);
-- Equipo B
-- Insertar datos de ejemplo en la tabla videos
INSERT INTO
    videos (
        titulo,
        descripcion,
        url_video
    )
VALUES (
        'Final de la Liga 2024',
        'La emocionante final entre los equipos A y B.',
        'https://www.youtube.com/watch?v=xyz'
    ),
    (
        'Mejores Goles del Torneo',
        'Los mejores goles de la temporada 2024.',
        'https://www.youtube.com/watch?v=abc'
    );

-- Insertar datos de ejemplo en la tabla carrusel
INSERT INTO
    carrusel (imagen_url, descripcion)
VALUES (
        'https://miweb.com/carrusel1.jpg',
        'Gran partido entre los equipos A y B'
    ),
    (
        'https://miweb.com/carrusel2.jpg',
        'Increíble actuación del equipo B'
    );

-- Insertar datos de ejemplo en la tabla patrocinadores
INSERT INTO
    patrocinadores (nombre, imagen_url, enlace)
VALUES (
        'Patrocinador 1',
        'https://miweb.com/patrocinador1.png',
        'https://www.patrocinador1.com'
    ),
    (
        'Patrocinador 2',
        'https://miweb.com/patrocinador2.png',
        'https://www.patrocinador2.com'
    );