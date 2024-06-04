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
                    <td><?php echo $item['id_salon']; ?></td>
                    <td><?php echo $item['Nombre']; ?></td>
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
