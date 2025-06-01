<?php require 'vista/layout/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="post" action="index.php?controlador=usuario&accion=actualizar">
        <input type="hidden" name="id" value="<?= $dato['codigo'] ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $dato['nombre'] ?>" required><br><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?= $dato['telefono'] ?>" required><br><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?= $dato['direccion'] ?>" required><br><br>
        <input type="submit" value="Actualizar">
        <a href="index.php?controlador=usuario&accion=index">Cancelar</a>
    </form>
</body>
</html>
<?php require 'vista/layout/footer.php'; ?>