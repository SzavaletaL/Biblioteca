<?php
function cargarControlador($nombre) {
    $archivo = "controlador/" . ucfirst($nombre) . "Controlador.php";
    if (file_exists($archivo)) {
        require_once $archivo;
        $clase = ucfirst($nombre) . "Controlador";
        return new $clase();
    } else {
        die("Controlador no encontrado: $nombre");
    }
}

function cargarAccion($controlador, $accion) {
    if (method_exists($controlador, $accion)) {
        $controlador->$accion();
    } else {
        die("Acción no encontrada: $accion");
    }
}
