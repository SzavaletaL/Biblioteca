<?php
class AutorController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $autores = $this->model->getAll();
        require __DIR__ . '/../views/Autor/index.php';
    }

    public function crearForm()
    {
        require __DIR__ . '/../views/Autor/crear.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            if (!empty($nombre)) {
                $this->model->create($nombre);
            }
            header('Location: /autor');
            exit;
        }
    }

    public function editarForm($id)
    {
        $autor = $this->model->getById($id);
        if ($autor) {
            require __DIR__ . '/../views/Autor/editar.php';
        } else {
            header('Location: /autor');
            exit;
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            if (!empty($nombre)) {
                $this->model->update($id, $nombre);
            }
            header('Location: /autor');
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->model->delete($id);
        header('Location: /autor');
        exit;
    }
}
