<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Autor</title>
</head>
<body>
    <h1>Registrar Autor</h1>
    <form method="post" action="index.php?controlador=autor&accion=guardar">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" value="Guardar">
        <a href="index.php?controlador=autor&accion=index">Cancelar</a>
    </form>
</body>
</html>
