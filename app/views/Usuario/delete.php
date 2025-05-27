<h2>Eliminar Usuario</h2>

<p>¿Estás seguro de que deseas eliminar al siguiente usuario?</p>

<ul>
    <li><strong>Nombre:</strong> <?= $usuario['Nombre'] ?></li>
    <li><strong>Teléfono:</strong> <?= $usuario['Telefono'] ?></li>
    <li><strong>Dirección:</strong> <?= $usuario['Direccion'] ?></li>
</ul>

<form method="POST">
    <button type="submit" name="confirmar">Sí, eliminar</button>
    <a href="index.php?controller=usuario&action=index">Cancelar</a>
</form>
