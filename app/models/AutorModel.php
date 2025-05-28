<?php
class AutorModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM Autor");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Registrar error
            error_log("Error en AutorModel::getAll(): " . $e->getMessage());
            return [];
        }
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM Autor WHERE Codigo = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre)
    {
        $stmt = $this->db->prepare("INSERT INTO Autor (Nombre) VALUES (?)");
        return $stmt->execute([$nombre]);
    }

    public function update($id, $nombre)
    {
        $stmt = $this->db->prepare("UPDATE Autor SET Nombre = ? WHERE Codigo = ?");
        return $stmt->execute([$nombre, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Autor WHERE Codigo = ?");
        return $stmt->execute([$id]);
    }
}
