<?php
require_once 'config/conexion.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $telefono, $direccion) {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nombre, telefono, direccion) VALUES (:nombre, :telefono, :direccion)");
        $stmt->execute([
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion
        ]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $telefono, $direccion) {
        $stmt = $this->pdo->prepare("UPDATE usuario SET nombre = :nombre, telefono = :telefono, direccion = :direccion WHERE codigo = :id");
        $stmt->execute([
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'id' => $id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
