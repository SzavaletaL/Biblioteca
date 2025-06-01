<?php
require_once 'modelo/Saca.php';
require_once 'modelo/Usuario.php';
require_once 'modelo/Ejemplar.php';

class SacaControlador {
    public function index() {
        $saca = new Saca();
        $datos = $saca->obtenerTodos();
        require 'vista/saca/listar.php';
    }

    public function crear() {
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerTodos();
        $ejemplar = new Ejemplar();
        $ejemplares = $ejemplar->obtenerTodos();
        require 'vista/saca/crear.php';
    }

    public function guardar() {
        $saca = new Saca();
        $saca->insertar($_POST['usuario_codigo'], $_POST['ejemplar_codigo'], $_POST['fechaprest'], $_POST['fechadev']);
        header('Location: index.php?controlador=saca&accion=index');
    }

    public function eliminar() {
        $saca = new Saca();
        $saca->eliminar($_GET['usuario_codigo'], $_GET['ejemplar_codigo']);
        header('Location: index.php?controlador=saca&accion=index');
    }
}
?>
