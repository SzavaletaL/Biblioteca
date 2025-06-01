<?php require 'vista/layout/header.php'; ?>

<h1>Autores</h1>
<a href="index.php?controlador=autor&accion=crear">+ Nuevo Autor</a>

<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($datos as $autor): ?>
    <tr>
        <td><?= $autor['codigo'] ?></td>
        <td><?= $autor['nombre'] ?></td>
        <td>
            <a href="index.php?controlador=autor&accion=editar&id=<?= $autor['codigo'] ?>">Editar</a> |
            <a href="index.php?controlador=autor&accion=eliminar&id=<?= $autor['codigo'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'vista/layout/footer.php'; ?>
