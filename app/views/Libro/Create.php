<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $editorial = $_POST['editorial'];
    $paginas = $_POST['paginas'];

    $sql = "INSERT INTO libro (Codigo, Titulo, ISBN, Editorial, Paginas)
            VALUES ('$codigo', '$titulo', '$isbn', '$editorial', '$paginas')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h2>Agregar nuevo libro</h2>
<form method="post">
    Código: <input type="number" name="codigo" required><br><br>
    Título: <input type="text" name="titulo" required><br><br>
    ISBN: <input type="text" name="isbn"><br><br>
    Editorial: <input type="text" name="editorial"><br><br>
    Páginas: <input type="number" name="paginas"><br><br>
    <input type="submit" value="Guardar">
    <a href="index.php">Cancelar</a>
</form>