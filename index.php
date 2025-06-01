<?php
require_once 'config/conexion.php';
require_once 'rutas.php';

$controladorNombre = $_GET['controlador'] ?? 'autor';
$accion = $_GET['accion'] ?? 'index';

$controlador = cargarControlador($controladorNombre);
cargarAccion($controlador, $accion);
