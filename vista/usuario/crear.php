<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Usuario</title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form method="post" action="index.php?controlador=usuario&accion=guardar">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" required><br><br>
        <input type="submit" value="Guardar">
        <a href="index.php?controlador=usuario&accion=index">Cancelar</a>
    </form>
</body>
</html>
