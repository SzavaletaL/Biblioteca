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
    Paginas INT NOT NULL CHECK (Paginas > 0)
);

-- Tabla EJEMPLAR
CREATE TABLE Ejemplar (
    Codigo INT PRIMARY KEY,
    Localizacion VARCHAR(100) NOT NULL,
    CodigoLibro INT NOT NULL,
    FOREIGN KEY (CodigoLibro) REFERENCES Libro (Codigo) ON DELETE CASCADE ON UPDATE CASCADE
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
    CodigoAutor INT NOT NULL,
    CodigoLibro INT NOT NULL,
    PRIMARY KEY (CodigoAutor, CodigoLibro),
    FOREIGN KEY (CodigoAutor) REFERENCES Autor (Codigo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (CodigoLibro) REFERENCES Libro (Codigo) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla intermedia SACA (relación N:M entre USUARIO y EJEMPLAR)
CREATE TABLE Saca (
    CodigoUsuario INT NOT NULL,
    CodigoEjemplar INT NOT NULL,
    FechaPres DATE NOT NULL,
    FechaDev DATE,
    PRIMARY KEY (
        CodigoUsuario,
        CodigoEjemplar,
        FechaPres
    ),
    FOREIGN KEY (CodigoUsuario) REFERENCES Usuario (Codigo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (CodigoEjemplar) REFERENCES Ejemplar (Codigo) ON DELETE CASCADE ON UPDATE CASCADE,
    CHECK (
        FechaDev IS NULL
        OR FechaDev >= FechaPres
    )
);