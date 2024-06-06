<div class="container mt-5">
    <h2 class="mb-4">Lista de Ubicaciones</h2>
    <a href="index.php?controller=ubicacion&action=create" class="btn btn-primary mb-3">Agregar Ubicacion</a>
    <ul class="list-group">


        <?php foreach ($ubicaciones as $ubicacion): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $ubicacion['nombre_armario']; ?>

                <span>
                    <a href="index.php?controller=curso&action=edit&id=<?php echo $curso['id_ubicacion']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?controller=curso&action=delete&id=<?php echo $curso['id_ubicacion']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </span>


            </li>
        <?php endforeach; ?>
    </ul>
</div>
