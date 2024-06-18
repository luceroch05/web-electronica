<div class="container mt-5">
    <h2 class="mb-4">Lista de Asistentes</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Turno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos_asistente as $asistente): ?>
                <tr>
                    <td><?php echo $asistente['nombre']; ?></td>
                    <td><?php echo $asistente['nombre_usuario']; ?></td>
                    <td><?php echo $asistente['nombre_turno']; ?></td>

                    <td>
                        <a href="index.php?controller=profesor&action=edit&id=<?php echo $asistente['id_asistente']; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?controller=profesor&action=delete&id=<?php echo $asistente['id_asistente']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
