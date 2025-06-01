<?php require 'vista/layout/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Libro</title>
</head>
<body>
    <h1>Registrar Libro</h1>
    <form method="post" action="index.php?controlador=libro&accion=guardar">
        <label>Título:</label><input type="text" name="titulo" required><br><br>
        <label>ISBN:</label><input type="text" name="isbn" required><br><br>
        <label>Editorial:</label><input type="text" name="editorial" required><br><br>
        <label>Páginas:</label><input type="number" name="paginas" required><br><br>
        <label>Autor:</label>
        <select name="autor_codigo" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($autores as $autor): ?>
                <option value="<?= $autor['codigo'] ?>"><?= $autor['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Guardar">
        <a href="index.php?controlador=libro&accion=index">Cancelar</a>
    </form>
</body>
</html>
<?php require 'vista/layout/footer.php'; ?>