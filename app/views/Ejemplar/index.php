<?php require '../layouts/header.php'; ?>

<h1>Lista de Autores</h1>
<a href="/autor/crear">Nuevo Autor</a>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($autores as $autor): ?>
        <tr>
            <td><?= $autor['Codigo'] ?></td>
            <td><?= $autor['Nombre'] ?></td>
            <td>
                <a href="/autor/editar/<?= $autor['Codigo'] ?>">Editar</a>
                <a href="/autor/eliminar/<?= $autor['Codigo'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require '../layouts/footer.php'; ?>