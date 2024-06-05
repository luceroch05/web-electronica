<a href="index.php?controller=salon&action=create" class="btn btn-primary mb-3">Agregar Salon</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($salones)): ?>
            <?php foreach ($salones as $salon): ?>
                <tr>
                    <td><?php echo $salon['id_salon']; ?></td>
                    <td><?php echo $salon['nombre_salon']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No items found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
