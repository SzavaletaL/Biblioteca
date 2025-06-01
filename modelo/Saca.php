<?php
require_once 'config/conexion.php';

class Saca {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT saca.*, usuario.nombre AS usuario, ejemplar.localizacion AS ejemplar 
                FROM saca 
                INNER JOIN usuario ON saca.usuario_codigo = usuario.codigo 
                INNER JOIN ejemplar ON saca.ejemplar_codigo = ejemplar.codigo";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($usuario_codigo, $ejemplar_codigo, $fechaprest, $fechadev) {
        $stmt = $this->pdo->prepare("INSERT INTO saca (usuario_codigo, ejemplar_codigo, fechaprest, fechadev)
                                     VALUES (:usuario_codigo, :ejemplar_codigo, :fechaprest, :fechadev)");
        $stmt->execute([
            'usuario_codigo' => $usuario_codigo,
            'ejemplar_codigo' => $ejemplar_codigo,
            'fechaprest' => $fechaprest,
            'fechadev' => $fechadev
        ]);
    }

    public function eliminar($usuario_codigo, $ejemplar_codigo) {
        $stmt = $this->pdo->prepare("DELETE FROM saca WHERE usuario_codigo = :usuario_codigo AND ejemplar_codigo = :ejemplar_codigo");
        $stmt->execute([
            'usuario_codigo' => $usuario_codigo,
            'ejemplar_codigo' => $ejemplar_codigo
        ]);
    }
}
?>
