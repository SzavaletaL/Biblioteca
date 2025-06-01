<?php
require_once 'modelo/Ejemplar.php';
require_once 'modelo/Libro.php';

class EjemplarControlador {
    public function index() {
        $ejemplar = new Ejemplar();
        $datos = $ejemplar->obtenerTodos();
        require 'vista/ejemplar/listar.php';
    }

    public function crear() {
        $libro = new Libro();
        $libros = $libro->obtenerTodos();
        require 'vista/ejemplar/crear.php';
    }

    public function guardar() {
        $ejemplar = new Ejemplar();
        $ejemplar->insertar($_POST['localizacion'], $_POST['libro_codigo']);
        header('Location: index.php?controlador=ejemplar&accion=index');
    }

    public function editar() {
        $ejemplar = new Ejemplar();
        $dato = $ejemplar->obtenerPorId($_GET['id']);
        $libro = new Libro();
        $libros = $libro->obtenerTodos();
        require 'vista/ejemplar/editar.php';
    }

    public function actualizar() {
        $ejemplar = new Ejemplar();
        $ejemplar->actualizar($_POST['id'], $_POST['localizacion'], $_POST['libro_codigo']);
        header('Location: index.php?controlador=ejemplar&accion=index');
    }

    public function eliminar() {
        $ejemplar = new Ejemplar();
        $ejemplar->eliminar($_GET['id']);
        header('Location: index.php?controlador=ejemplar&accion=index');
    }
}
?>
