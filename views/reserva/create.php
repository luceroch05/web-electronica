<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Crear Reserva</h2>
    <form action="index.php?controller=reserva&action=store" method="POST">
        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo:</label>
            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select class="form-control" id="item" name="item[]" required>
                            <option value="" selected disabled>Selecciona un ítem</option>
                            <?php foreach ($items as $item): ?>
                                <option value="<?php echo $item['id_item']; ?>"><?php echo $item['descripcion']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" id="cantidad" name="cantidad[]" min="1" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" id="add-item">Agregar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
</div>






<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#add-item').on('click', function(){
            // Clonar la fila para agregar nuevos items
            var newRow = '<tr>' +
                '<td>' +
                '<select class="form-control" name="item[]" required>' +
                '<option value="" selected disabled>Selecciona un ítem</option>' +
                '<?php foreach ($items as $item): ?>' +
                '<option value="<?php echo $item['id_item']; ?>"><?php echo $item['descripcion']; ?></option>' +
                '<?php endforeach; ?>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input type="number" class="form-control" name="cantidad[]" min="1" required>' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger remove-item">Eliminar</button>' +
                '</td>' +
                '</tr>';
            
            // Agregar la nueva fila a la tabla
            $('table tbody').append(newRow);
        });

        // Eliminar una fila de ítem
        $(document).on('click', '.remove-item', function(){
            $(this).closest('tr').remove();
        });
    });
</script>
</body>
</html>
