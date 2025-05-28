<?php require '../layouts/header.php'; ?>

<h1>Lista de Autores</h1>
<a href="/autor/crear">Nuevo Autor</a>

<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php if (!empty($autores)): ?>
        <?php foreach ($autores as $autor): ?>
            <tr>
                <td><?= htmlspecialchars($autor['Codigo']) ?></td>
                <td><?= htmlspecialchars($autor['Nombre']) ?></td>
                <td>
                    <a href="/autor/editar/<?= $autor['Codigo'] ?>">Editar</a>
                    <a href="/autor/eliminar/<?= $autor['Codigo'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">No se encontraron autores</td>
        </tr>
    <?php endif; ?>
</table>

<?php require '../layouts/footer.php'; ?>