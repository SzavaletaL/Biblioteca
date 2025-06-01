<?php
require_once 'modelo/Libro.php';
require_once 'modelo/Autor.php';

class LibroControlador {
    public function index() {
        $libro = new Libro();
        $datos = $libro->obtenerTodos();
        require 'vista/libro/listar.php';
    }

    public function crear() {
        $autor = new Autor();
        $autores = $autor->obtenerTodos();
        require 'vista/libro/crear.php';
    }

    public function guardar() {
        $libro = new Libro();
        $libro->insertar($_POST['titulo'], $_POST['isbn'], $_POST['editorial'], $_POST['paginas'], $_POST['autor_codigo']);
        header('Location: index.php?controlador=libro&accion=index');
    }

    public function editar() {
        $libro = new Libro();
        $dato = $libro->obtenerPorId($_GET['id']);
        $autor = new Autor();
        $autores = $autor->obtenerTodos();
        require 'vista/libro/editar.php';
    }

    public function actualizar() {
        $libro = new Libro();
        $libro->actualizar($_POST['id'], $_POST['titulo'], $_POST['isbn'], $_POST['editorial'], $_POST['paginas'], $_POST['autor_codigo']);
        header('Location: index.php?controlador=libro&accion=index');
    }

    public function eliminar() {
        $libro = new Libro();
        $libro->eliminar($_GET['id']);
        header('Location: index.php?controlador=libro&accion=index');
    }
}
?>
