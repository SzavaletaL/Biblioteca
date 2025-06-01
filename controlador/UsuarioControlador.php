<?php
require_once 'modelo/Usuario.php';

class UsuarioControlador {
    public function index() {
        $usuario = new Usuario();
        $datos = $usuario->obtenerTodos();
        require 'vista/usuario/listar.php';
    }

    public function crear() {
        require 'vista/usuario/crear.php';
    }

    public function guardar() {
        $usuario = new Usuario();
        $usuario->insertar($_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
        header('Location: index.php?controlador=usuario&accion=index');
    }

    public function editar() {
        $usuario = new Usuario();
        $dato = $usuario->obtenerPorId($_GET['id']);
        require 'vista/usuario/editar.php';
    }

    public function actualizar() {
        $usuario = new Usuario();
        $usuario->actualizar($_POST['id'], $_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
        header('Location: index.php?controlador=usuario&accion=index');
    }

    public function eliminar() {
        $usuario = new Usuario();
        $usuario->eliminar($_GET['id']);
        header('Location: index.php?controlador=usuario&accion=index');
    }
}
?>
