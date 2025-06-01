<?php
require_once 'modelo/Autor.php';

class AutorControlador {
    public function index() {
        $autor = new Autor();
        $datos = $autor->obtenerTodos();
        require 'vista/autor/listar.php';
    }

    public function crear() {
        require 'vista/autor/crear.php';
    }

    public function guardar() {
        $autor = new Autor();
        $autor->insertar($_POST['nombre']);
        header('Location: index.php?controlador=autor&accion=index');
    }

    public function editar() {
        $autor = new Autor();
        $dato = $autor->obtenerPorId($_GET['id']);
        require 'vista/autor/editar.php';
    }

    public function actualizar() {
        $autor = new Autor();
        $autor->actualizar($_POST['id'], $_POST['nombre']);
        header('Location: index.php?controlador=autor&accion=index');
    }

    public function eliminar() {
        $autor = new Autor();
        $autor->eliminar($_GET['id']);
        header('Location: index.php?controlador=autor&accion=index');
    }
}
?>
