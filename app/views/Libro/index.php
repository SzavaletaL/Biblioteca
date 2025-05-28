<?php require '../layouts/header.php'; ?>

<h1>Lista de Libros</h1>
<a href="/autor/crear">Nuevo Libro</a>
<table>
    <tr>
        <th>Código</th>
        <th>Titulo</th>
        <th>ISBN</th>
        <th>Editorial</th>
        <th>Páginas</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($autores as $autor): ?>
        <tr>
            <td><?= $autor['Codigo'] ?></td>
            <td><?= $autor['Titulo'] ?></td>
            <td><?= $autor['ISBN'] ?></td>
            <td><?= $autor['Editorial'] ?></td>
            <td><?= $autor['Paginas'] ?></td>
            <td>
                <a href="/autor/editar/<?= $autor['Codigo'] ?>">Editar</a>
                <a href="/autor/eliminar/<?= $autor['Codigo'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require '../layouts/footer.php'; ?>