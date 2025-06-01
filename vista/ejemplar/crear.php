<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Ejemplar</title>
</head>
<body>
    <h1>Registrar Ejemplar</h1>
    <form method="post" action="index.php?controlador=ejemplar&accion=guardar">
        <label>Localización:</label>
        <input type="text" name="localizacion" required><br><br>
        <label>Libro:</label>
        <select name="libro_codigo" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($libros as $libro): ?>
                <option value="<?= $libro['codigo'] ?>"><?= $libro['titulo'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Guardar">
        <a href="index.php?controlador=ejemplar&accion=index">Cancelar</a>
    </form>
</body>
</html>
