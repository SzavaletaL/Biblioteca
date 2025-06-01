<?php
require_once 'config/conexion.php';

class Autor {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT * FROM autor");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre) {
        $stmt = $this->pdo->prepare("INSERT INTO autor (nombre) VALUES (:nombre)");
        $stmt->execute(['nombre' => $nombre]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM autor WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre) {
        $stmt = $this->pdo->prepare("UPDATE autor SET nombre = :nombre WHERE codigo = :id");
        $stmt->execute(['nombre' => $nombre, 'id' => $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM autor WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
