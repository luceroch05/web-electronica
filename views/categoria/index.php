<div class="container mt-5">
    <h2 class="mb-4">Categoria</h2>
    <a href="index.php?controller=categoria&action=create" class="btn btn-primary mb-3">Agregar Categoria</a>
    <ul class="list-group">
        <?php foreach ($categorias as $categoria): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $categoria['nombre_categoria']; ?>
                <span>
                    <a href="index.php?controller=categoria&action=edit&id=<?php echo $curso['id_categoria']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?controller=categoria&action=delete&id=<?php echo $curso['id_categoria']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
