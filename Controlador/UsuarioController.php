<?php
require_once 'models/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function index() {
        $usuarios = $this->model->getAll();
        include 'views/usuario/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
            header("Location: index.php?controller=usuario&action=index");
        } else {
            include 'views/usuario/create.php';
        }
    }

    public function edit() {
        $usuario = $this->model->getById($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($_GET['id'], $_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
            header("Location: index.php?controller=usuario&action=index");
        } else {
            include 'views/usuario/edit.php';
        }
    }

public function delete() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
        $this->model->delete($_GET['id']);
        header("Location: index.php?controller=usuario&action=index");
    } else {
        $usuario = $this->model->getById($_GET['id']);
        include 'views/usuario/delete.php';
    }
}

}
?>
