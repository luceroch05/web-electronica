<div class="container">
    <h2>Lista de Usuarios</h2>
    <a href="index.php?controller=usuario&action=create" class="btn btn-success mb-3">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Contraseña</th>
                <th>ID Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id_usuario']; ?></td>
                <td><?php echo $usuario['nombre_usuario']; ?></td>
                <td><?php echo $usuario['password']; ?></td>
                <td><?php echo $usuario['id_rol']; ?></td>
                <td>
                    <a href="index.php?controller=usuario&action=edit&id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-primary">Editar</a>
                    <form action="index.php?controller=usuario&action=delete&id=<?php echo $usuario['id_usuario']; ?>" method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>