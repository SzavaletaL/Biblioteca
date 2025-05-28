<?php
class AutorController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // Listar autores
    public function index()
    {
        $autores = $this->model->getAll();
        require '../views/Autor/index.php';
    }

    // Mostrar formulario de creación
    public function crearForm()
    {
        require '../views/Autor/crear.php';
    }

    // Procesar creación
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['nombre']);
            header('Location: /autor');
        }
    }

    // Mostrar formulario de edición
    public function editarForm($codigo)
    {
        // Necesitarías un método en el modelo para obtener un autor por código
        $autor = $this->model->getById($codigo);
        require '../views/Autor/editar.php';
    }

    // Procesar edición
    public function editar($codigo)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($codigo, $_POST['nombre']);
            header('Location: /autor');
        }
    }

    // Eliminar autor
    public function eliminar($codigo)
    {
        $this->model->delete($codigo);
        header('Location: /autor');
    }
}
