<div class="container mt-5">
    <h2 class="mb-4">Lista de Profesores</h2>
    <a href="index.php?controller=profesor&action=create" class="btn btn-primary mb-3">Agregar Profesor</a>
    <ul class="list-group">


        <?php foreach ($profesores as $profesor): ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">

                <?php echo $profesor['nombre']; ?>



                <span>
                    <a href="index.php?controller=profesor&action=edit&id=<?php echo $profesor['id_profesor']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?controller=profesor&action=delete&id=<?php echo $profesor['id_profesor']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </span>


            </li>
        <?php endforeach; ?>
    </ul>
</div>
            