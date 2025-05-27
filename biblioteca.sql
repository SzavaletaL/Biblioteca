-- Crear la base de datos
CREATE DATABASE Biblioteca;

USE Biblioteca;

-- Tabla AUTOR
CREATE TABLE Autor (
    Codigo INT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

-- Tabla LIBRO
CREATE TABLE Libro (
    Codigo INT PRIMARY KEY,
    Titulo VARCHAR(100) NOT NULL,
    ISBN VARCHAR(20),
    Editorial VARCHAR(100),
    Paginas INT
);

-- Tabla EJEMPLAR
CREATE TABLE Ejemplar (
    Codigo INT PRIMARY KEY,
    Localizacion VARCHAR(100),
    CodigoLibro INT,
    FOREIGN KEY (CodigoLibro) REFERENCES Libro (Codigo)
);

-- Tabla USUARIO
CREATE TABLE Usuario (
    Codigo INT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Telefono VARCHAR(20),
    Direccion VARCHAR(150)
);

-- Tabla intermedia ESCRIBE (relación N:M entre AUTOR y LIBRO)
CREATE TABLE Escribe (
    CodigoAutor INT,
    CodigoLibro INT,
    PRIMARY KEY (CodigoAutor, CodigoLibro),
    FOREIGN KEY (CodigoAutor) REFERENCES Autor (Codigo),
    FOREIGN KEY (CodigoLibro) REFERENCES Libro (Codigo)
);

-- Tabla intermedia SACA (relación N:M entre USUARIO y EJEMPLAR)
CREATE TABLE Saca (
    CodigoUsuario INT,
    CodigoEjemplar INT,
    FechaPres DATE,
    FechaDev DATE,
    PRIMARY KEY (
        CodigoUsuario,
        CodigoEjemplar,
        FechaPres
    ),
    FOREIGN KEY (CodigoUsuario) REFERENCES Usuario (Codigo),
    FOREIGN KEY (CodigoEjemplar) REFERENCES Ejemplar (Codigo)
)