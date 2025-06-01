<!DOCTYPE html>
<html>
<head>
    <title>Editar Autor</title>
</head>
<body>
    <h1>Editar Autor</h1>
    <form method="post" action="index.php?controlador=autor&accion=actualizar">
        <input type="hidden" name="id" value="<?= $dato['codigo'] ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $dato['nombre'] ?>" required>
        <br><br>
        <input type="submit" value="Actualizar">
        <a href="index.php?controlador=autor&accion=index">Cancelar</a>
    </form>
</body>
</html>
