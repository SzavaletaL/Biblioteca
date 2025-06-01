<?php require 'vista/layout/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Ejemplar</title>
</head>
<body>
    <h1>Editar Ejemplar</h1>
    <form method="post" action="index.php?controlador=ejemplar&accion=actualizar">
        <input type="hidden" name="id" value="<?= $dato['codigo'] ?>">
        <label>Localización:</label>
        <input type="text" name="localizacion" value="<?= $dato['localizacion'] ?>" required><br><br>
        <label>Libro:</label>
        <select name="libro_codigo" required>
            <?php foreach ($libros as $libro): ?>
                <option value="<?= $libro['codigo'] ?>" <?= ($libro['codigo'] == $dato['libro_codigo']) ? 'selected' : '' ?>>
                    <?= $libro['titulo'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Actualizar">
        <a href="index.php?controlador=ejemplar&accion=index">Cancelar</a>
    </form>
</body>
</html>
<?php require 'vista/layout/footer.php'; ?>