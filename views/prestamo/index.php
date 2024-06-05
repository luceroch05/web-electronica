<div class="container mt-5">
    <h2 class="mb-4">Lista de Prestamos</h2>
    <a href="index.php?controller=prestamo&action=create" class="btn btn-primary mb-3">Realizar Prestamos</a>
    <ul class="list-group">


        <?php foreach ($prestamos as $prestamo): ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">

                <?php echo $ubicacion['Nombre']; ?>

                <span>
                    <a href="index.php?controller=prestamo&action=edit&id=<?php echo $prestamo['id_prestamo']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?controller=prestamo&action=delete&id=<?php echo $curso['id_prestamo']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </span>


            </li>
        <?php endforeach; ?>
    </ul>
</div>
            