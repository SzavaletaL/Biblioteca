<?php
require_once 'config/conexion.php';

class Ejemplar {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT ejemplar.*, libro.titulo AS libro FROM ejemplar 
                                   LEFT JOIN libro ON ejemplar.libro_codigo = libro.codigo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($localizacion, $libro_codigo) {
        $stmt = $this->pdo->prepare("INSERT INTO ejemplar (localizacion, libro_codigo) VALUES (:localizacion, :libro_codigo)");
        $stmt->execute([
            'localizacion' => $localizacion,
            'libro_codigo' => $libro_codigo
        ]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM ejemplar WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $localizacion, $libro_codigo) {
        $stmt = $this->pdo->prepare("UPDATE ejemplar SET localizacion = :localizacion, libro_codigo = :libro_codigo WHERE codigo = :id");
        $stmt->execute([
            'localizacion' => $localizacion,
            'libro_codigo' => $libro_codigo,
            'id' => $id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM ejemplar WHERE codigo = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
