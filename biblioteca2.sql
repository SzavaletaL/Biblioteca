DROP DATABASE IF EXISTS biblioteca;

CREATE DATABASE biblioteca DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE biblioteca;

CREATE TABLE IF NOT EXISTS autor ( 
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
) ENGINE INNODB;

CREATE TABLE IF NOT EXISTS libro ( 
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    isbn VARCHAR(10) NOT NULL,
    editorial VARCHAR(100) NOT NULL,
    paginas INT NOT NULL,
    autor_codigo INT,
    FOREIGN KEY (autor_codigo) REFERENCES autor(codigo)
) ENGINE INNODB;

CREATE TABLE IF NOT EXISTS ejemplar ( 
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    localizacion VARCHAR(255) NOT NULL,
    libro_codigo INT,
    FOREIGN KEY (libro_codigo) REFERENCES libro(codigo)
) ENGINE INNODB;

CREATE TABLE IF NOT EXISTS usuario ( 
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    direccion VARCHAR(100) NOT NULL
) ENGINE INNODB;

CREATE TABLE IF NOT EXISTS saca (
    usuario_codigo INT,
    ejemplar_codigo INT,
    fechaprest DATE,
    fechadev DATE,
    PRIMARY KEY (usuario_codigo, ejemplar_codigo),
    FOREIGN KEY (usuario_codigo) REFERENCES usuario(codigo),
    FOREIGN KEY (ejemplar_codigo) REFERENCES ejemplar(codigo)
) ENGINE INNODB;
