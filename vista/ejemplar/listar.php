<?php require 'vista/layout/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Ejemplares</title>
</head>
<body>
    <h1>Ejemplares</h1>
    <a href="index.php?controlador=ejemplar&accion=crear">+ Nuevo Ejemplar</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Código</th>
            <th>Localización</th>
            <th>Libro</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($datos as $ejemplar): ?>
        <tr>
            <td><?= $ejemplar['codigo'] ?></td>
            <td><?= $ejemplar['localizacion'] ?></td>
            <td><?= $ejemplar['libro'] ?></td>
            <td>
                <a href="index.php?controlador=ejemplar&accion=editar&id=<?= $ejemplar['codigo'] ?>">Editar</a> |
                <a href="index.php?controlador=ejemplar&accion=eliminar&id=<?= $ejemplar['codigo'] ?>" onclick="return confirm('¿Eliminar ejemplar?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php require 'vista/layout/footer.php'; ?>