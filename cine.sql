CREATE DATABASE cine;

USE cine;

CREATE TABLE tiposSalas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    capacidad INT NOT NULL,
    estatus VARCHAR(20) DEFAULT 'activo'
);

CREATE TABLE clasificaciones(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(5) NOT NULL,
    estatus VARCHAR(20) DEFAULT 'activo'
);

CREATE TABLE generos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    estatus VARCHAR(20) DEFAULT 'activo'
);

CREATE TABLE salas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    idTipoSala INT,
    estatus VARCHAR(20) DEFAULT 'activo',
    FOREIGN KEY (idTipoSala) REFERENCES tiposSalas(id)
);

CREATE TABLE peliculas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    idGeneros INT,
    idClasificacion INT,
    estatus VARCHAR(20) DEFAULT 'activo',
    FOREIGN KEY (idGeneros) REFERENCES generos(id),
    FOREIGN KEY (idClasificacion) REFERENCES clasificaciones(id)
);

CREATE TABLE funciones(
    id INT AUTO_INCREMENT PRIMARY KEY,
    horaInicio DATETIME NOT NULL,
    horaFin DATETIME NOT NULL,
    dia DATE NOT NULL,
    idPelicula INT,
    idSala INT,
    estatus VARCHAR(20) DEFAULT 'activo',
    FOREIGN KEY (idPelicula) REFERENCES peliculas(id),
    FOREIGN KEY (idSala) REFERENCES salas(id)
);

--- INSERT'S ---

INSERT INTO tiposSalas (nombre, capacidad) VALUES
('2D', 100),
('3D', 80),
('IMAX', 150);

INSERT INTO clasificaciones (nombre) VALUES
('G'),
('PG'),
('PG-13'),
('R'),
('NC-17');

INSERT INTO generos (nombre) VALUES
('Acción'),
('Comedia'),
('Drama'),
('Terror'),
('Ciencia Ficción'),
('Animación');

INSERT INTO salas (nombre, idTipoSala) VALUES
('Sala 1', 1),
('Sala 2', 2),
('Sala 3', 3);


INSERT INTO peliculas (titulo, idGeneros, idClasificacion) VALUES
('Inception', 5, 3),
('Toy Story', 6, 1),
('The Dark Knight', 1, 4),
('Forrest Gump', 3, 2),
('The Conjuring', 4, 4);


INSERT INTO funciones (horaInicio, horaFin, dia, idPelicula, idSala) VALUES
('2023-10-01 14:00:00', '2023-10-01 16:30:00', '2023-10-01', 1, 1),
('2023-10-01 17:00:00', '2023-10-01 19:00:00', '2023-10-01', 2, 2),
('2023-10-01 20:00:00', '2023-10-01 22:30:00', '2023-10-01', 3, 3),
('2023-10-02 14:00:00', '2023-10-02 16:30:00', '2023-10-02', 4, 1),
('2023-10-02 17:00:00', '2023-10-02 19:00:00', '2023-10-02', 5, 2);

-- END INSERT'S --