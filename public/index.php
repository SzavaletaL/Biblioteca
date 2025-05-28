<?php // public/index.php

// Cargar variables .env manualmente
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) { // Ignorar comentarios
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        putenv("$name=$value");
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
} else {
    die('.env no encontrado');
}

// Luego continúa con el resto del código...
// Después de cargar el .env
require __DIR__ . '/../app/core/Database.php';
$db = new Database();

// Inicializar modelos y controladores
$autorModel = new AutorModel($db->getConnection());
$autorController = new AutorController($autorModel);