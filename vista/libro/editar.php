<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form method="post" action="index.php?controlador=libro&accion=actualizar">
        <input type="hidden" name="id" value="<?= $dato['codigo'] ?>">
        <label>Título:</label><input type="text" name="titulo" value="<?= $dato['titulo'] ?>" required><br><br>
        <label>ISBN:</label><input type="text" name="isbn" value="<?= $dato['isbn'] ?>" required><br><br>
        <label>Editorial:</label><input type="text" name="editorial" value="<?= $dato['editorial'] ?>" required><br><br>
        <label>Páginas:</label><input type="number" name="paginas" value="<?= $dato['paginas'] ?>" required><br><br>
        <label>Autor:</label>
        <select name="autor_codigo" required>
            <?php foreach ($autores as $autor): ?>
                <option value="<?= $autor['codigo'] ?>" <?= ($autor['codigo'] == $dato['autor_codigo']) ? 'selected' : '' ?>>
                    <?= $autor['nombre'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Actualizar">
        <a href="index.php?controlador=libro&accion=index">Cancelar</a>
    </form>
</body>
</html>
