<?php require 'vista/layout/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Libros</h1>
    <a href="index.php?controlador=libro&accion=crear">+ Nuevo Libro</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Páginas</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($datos as $libro): ?>
        <tr>
            <td><?= $libro['codigo'] ?></td>
            <td><?= $libro['titulo'] ?></td>
            <td><?= $libro['isbn'] ?></td>
            <td><?= $libro['editorial'] ?></td>
            <td><?= $libro['paginas'] ?></td>
            <td><?= $libro['autor'] ?></td>
            <td>
                <a href="index.php?controlador=libro&accion=editar&id=<?= $libro['codigo'] ?>">Editar</a> |
                <a href="index.php?controlador=libro&accion=eliminar&id=<?= $libro['codigo'] ?>" onclick="return confirm('¿Eliminar libro?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php require 'vista/layout/footer.php'; ?>