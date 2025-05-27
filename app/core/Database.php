<?php
class Database
{
    // Declara las propiedades aquí primero
    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $port;
    private $conn; // Objeto de conexión

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->port = $_ENV['DB_PORT'] ?? '3306';

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: Revisa las credenciales en .env");
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
