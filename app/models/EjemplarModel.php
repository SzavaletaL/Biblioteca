<?php
class AutorModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Obtener todos los autores
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM Autor");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un autor
    public function create($nombre)
    {
        $sql = "INSERT INTO Autor (Nombre) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre]);
    }

    // Actualizar autor
    public function update($codigo, $nombre)
    {
        $sql = "UPDATE Autor SET Nombre = ? WHERE Codigo = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $codigo]);
    }

    // Eliminar autor
    public function delete($codigo)
    {
        $sql = "DELETE FROM Autor WHERE Codigo = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
