<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Préstamo</title>
</head>
<body>
    <h1>Registrar Préstamo</h1>
    <form method="post" action="index.php?controlador=saca&accion=guardar">
        <label>Usuario:</label>
        <select name="usuario_codigo" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($usuarios as $u): ?>
                <option value="<?= $u['codigo'] ?>"><?= $u['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Ejemplar:</label>
        <select name="ejemplar_codigo" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($ejemplares as $e): ?>
                <option value="<?= $e['codigo'] ?>"><?= $e['localizacion'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Fecha Préstamo:</label>
        <input type="date" name="fechaprest" required><br><br>

        <label>Fecha Devolución:</label>
        <input type="date" name="fechadev" required><br><br>

        <input type="submit" value="Guardar">
        <a href="index.php?controlador=saca&accion=index">Cancelar</a>
    </form>
</body>
</html>
