<?php require 'vista/layout/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Préstamos</title>
</head>
<body>
    <h1>Préstamos realizados</h1>
    <a href="index.php?controlador=saca&accion=crear">+ Registrar Préstamo</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Usuario</th>
            <th>Ejemplar</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Devolución</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($datos as $s): ?>
        <tr>
            <td><?= $s['usuario'] ?></td>
            <td><?= $s['ejemplar'] ?></td>
            <td><?= $s['fechaprest'] ?></td>
            <td><?= $s['fechadev'] ?></td>
            <td>
                <a href="index.php?controlador=saca&accion=eliminar&usuario_codigo=<?= $s['usuario_codigo'] ?>&ejemplar_codigo=<?= $s['ejemplar_codigo'] ?>" onclick="return confirm('¿Eliminar préstamo?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
