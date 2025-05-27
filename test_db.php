<?php
// Cargar variables .env manualmente
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) continue; // Ignorar líneas vacías o comentarios

        // Ignorar líneas mal formadas
        if (strpos($line, '=') === false) continue;

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        // Remover comillas si las hay
        $value = trim($value, '"\'');

        $_ENV[$name] = $value;
        putenv("$name=$value"); // Opcional: para uso con getenv()
    }
} else {
    exit('Archivo .env no encontrado');
}

// Incluir Database.php
require_once __DIR__ . '/app/core/Database.php';

$db = new Database();
$conn = $db->getConnection();

// Ejemplo de consulta para probar la conexión
try {
    $stmt = $conn->query("SELECT 1");
    if ($stmt && $stmt->fetch()) {
        echo "¡Conexión exitosa! 🎉";
    } else {
        echo "Error en la consulta.";
    }
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
}
