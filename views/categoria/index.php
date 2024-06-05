<div class="container">
    <h2>Lista de Categorías</h2>
    <a href="index.php?controller=categoria&action=create" class="btn btn-success mb-3">Crear Categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo $categoria['id_categoria']; ?></td>
                <td><?php echo $categoria['nombre_categoria']; ?></td>
                <td>
                    <a href="index.php?controller=categoria&action=edit&id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-primary">Editar</a>
                    <form action="index.php?controller=categoria&action=delete&id=<?php echo $categoria['id_categoria']; ?>" method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
