<?php
class Router
{
    private $routes = [];
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addRoute($pattern, $handler)
    {
        $this->routes[$pattern] = $handler;
    }

    public function dispatch($uri, $method = 'GET')
    {
        // Buscar coincidencia en las rutas registradas
        foreach ($this->routes as $pattern => $handler) {
            // Convertir patrón a regex
            $regex = str_replace('/', '\/', $pattern);
            $regex = preg_replace('/\:(\w+)/', '(?<$1>\d+)', $regex);
            $regex = '/^' . $regex . '$/';

            if (preg_match($regex, $uri, $matches)) {
                // Limpiar parámetros numéricos
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (is_callable($handler)) {
                    // Manejar función anónima
                    call_user_func_array($handler, $params);
                    return;
                } elseif (is_string($handler) && strpos($handler, '@') !== false) {
                    // Manejar controlador@método
                    list($controllerName, $methodName) = explode('@', $handler);

                    // Cargar controlador
                    $controllerFile = __DIR__ . "/../controllers/$controllerName.php";
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;

                        // Cargar modelo correspondiente
                        $modelName = str_replace('Controller', 'Model', $controllerName);
                        $modelFile = __DIR__ . "/../models/$modelName.php";

                        if (file_exists($modelFile)) {
                            require_once $modelFile;
                            $model = new $modelName($this->db);
                        } else {
                            $model = null;
                        }

                        // Instanciar controlador
                        $controller = new $controllerName($model);

                        // Verificar si el método existe
                        if (method_exists($controller, $methodName)) {
                            call_user_func_array([$controller, $methodName], $params);
                            return;
                        }
                    }
                }
            }
        }

        // No se encontró ninguna ruta
        http_response_code(404);
        echo "Página no encontrada";
    }
}
