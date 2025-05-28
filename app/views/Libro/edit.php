<?php
include 'conexion.php';

if (!isset($_GET['codigo'])) {
    header("Location: index.php");
    exit();
}

$codigo = $_GET['codigo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $editorial = $_POST['editorial'];
    $paginas = $_POST['paginas'];

    $sql = "UPDATE Libro SET Titulo='$titulo', ISBN='$isbn', Editorial='$editorial', Paginas='$paginas'
            WHERE Codigo='$codigo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$sql = "SELECT * FROM Libro WHERE Codigo='$codigo'";
$resultado = $conn->query($sql);
$libro = $resultado->fetch_assoc();
?>
<h2>Editar libro</h2>
<form method="post">
    Código: <?= $libro['Codigo'] ?><br><br>
    Título: <input type="text" name="titulo" value="<?= $libro['Titulo'] ?>" required><br><br>
    ISBN: <input type="text" name="isbn" value="<?= $libro['ISBN'] ?>"><br><br>
    Editorial: <input type="text" name="editorial" value="<?= $libro['Editorial'] ?>"><br><br>
    Páginas: <input type="number" name="paginas" value="<?= $libro['Paginas'] ?>"><br><br>
    <input type="submit" value="Actualizar">
    <a href="index.php">Cancelar</a>
</form>