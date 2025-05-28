<?php
// Al inicio de public/index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// public/index.php - Front Controller

// 1. Cargar variables de entorno desde .env
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignorar comentarios
        if (strpos(trim($line), '#') === 0) continue;

        // Separar nombre y valor
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // Eliminar comillas si existen
            if (preg_match('/^"(.*)"$/', $value, $matches)) {
                $value = $matches[1];
            } elseif (preg_match('/^\'(.*)\'$/', $value, $matches)) {
                $value = $matches[1];
            }

            $_ENV[$name] = $value;
            putenv("$name=$value");
        }
    }
} else {
    die('Error: Archivo .env no encontrado');
}

// 2. Cargar clases esenciales
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';

// 3. Inicializar base de datos
try {
    $database = new Database();
    $db = $database->getConnection();
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// 4. Configurar el enrutador
$router = new Router($db);

// ===================================================================
// REGISTRO DE RUTAS PARA AUTOR
// ===================================================================
$router->addRoute('/autor', 'AutorController@index');
$router->addRoute('/Biblioteca/autor', 'AutorController@index');
$router->addRoute('/autor/crear', 'AutorController@crearForm');
$router->addRoute('/autor/guardar', 'AutorController@crear');
$router->addRoute('/autor/editar/(\d+)', 'AutorController@editarForm');
$router->addRoute('/autor/actualizar/(\d+)', 'AutorController@editar');
$router->addRoute('/autor/eliminar/(\d+)', 'AutorController@eliminar');

// ===================================================================
// REGISTRO DE RUTAS PARA USUARIO (EJEMPLO)
// ===================================================================
$router->addRoute('/usuario', 'UsuarioController@index');
$router->addRoute('/usuario/crear', 'UsuarioController@crearForm');
$router->addRoute('/usuario/guardar', 'UsuarioController@crear');
$router->addRoute('/usuario/editar/(\d+)', 'UsuarioController@editarForm');
$router->addRoute('/usuario/actualizar/(\d+)', 'UsuarioController@editar');
$router->addRoute('/usuario/eliminar/(\d+)', 'UsuarioController@eliminar');

// ===================================================================
// RUTA DE INICIO
// ===================================================================
$router->addRoute('/', function () {
    header('Location: /autor');
    exit;
});

// 5. Manejar la solicitud actual
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);
