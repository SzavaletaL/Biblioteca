<?php require 'vista/layout/header.php'; ?>

<h1>Usuarios</h1>
<a href="index.php?controlador=usuario&accion=crear">+ Nuevo Usuario</a>

<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($datos as $usuario): ?>
    <tr>
        <td><?= $usuario['codigo'] ?></td>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['telefono'] ?></td>
        <td><?= $usuario['direccion'] ?></td>
        <td>
            <a href="index.php?controlador=usuario&accion=editar&id=<?= $usuario['codigo'] ?>">Editar</a> |
            <a href="index.php?controlador=usuario&accion=eliminar&id=<?= $usuario['codigo'] ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'vista/layout/footer.php'; ?>
