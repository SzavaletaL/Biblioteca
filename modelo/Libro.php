<?php
require_once 'config/conexion.php';

class Libro {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT libro.*, autor.nombre AS autor FROM libro LEFT JOIN autor ON libro.autor_codigo = autor.codigo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($titulo, $isbn, $editorial, $paginas, $autor_codigo) {
        $stmt = $this->pdo->prepare("INSERT INTO libro (titulo, isbn, editorial, paginas, autor_codigo) 
                                     VALUES (:titulo, :isbn, :editorial, :paginas, :autor_codigo)");
        $stmt->execute([
            'titulo' => $titulo,
            'isbn' => $isbn,
            'editorial' => $editorial,
            'paginas' => $paginas,
            'autor_codigo' => $autor_codigo
        ]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM libro WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $isbn, $editorial, $paginas, $autor_codigo) {
        $stmt = $this->pdo->prepare("UPDATE libro 
            SET titulo = :titulo, isbn = :isbn, editorial = :editorial, paginas = :paginas, autor_codigo = :autor_codigo 
            WHERE codigo = :id");
        $stmt->execute([
            'titulo' => $titulo,
            'isbn' => $isbn,
            'editorial' => $editorial,
            'paginas' => $paginas,
            'autor_codigo' => $autor_codigo,
            'id' => $id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM libro WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
