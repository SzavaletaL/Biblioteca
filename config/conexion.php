<?php
class Conexion {
    public static function conectar() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=biblioteca2;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
