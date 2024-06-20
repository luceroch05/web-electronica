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

        <div class="form-group">
            <label for="ciclo">Ciclo:</label>
            <select class="form-control" id="ciclo" name="ciclo" required onchange="cargarUnidadesDidacticas()">
                <option value="" disabled>Selecciona ciclo</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
            </select>
        </div>

        <div class="form-group" id="div_unidad_didactica" style="display: none;">
            <label for="unidad_didactica">Unidad Didactica:</label>
            <select class="form-control" id="unidad_didactica" name="unidad_didactica" required>
                <option value="" disabled>Selecciona una Unidad Didactica</option>
                <!-- Las opciones se llenarán dinámicamente -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
</div>

<script>
function cargarUnidadesDidacticas() {
    var ciclo = document.getElementById('ciclo').value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?controller=reserva&action=obtener_unidad_didactica&ciclo=' + encodeURIComponent(ciclo), true);

    xhr.onload = function() {

        console.log("Response Text:", xhr.responseText); // Añadir esto para ver la respuesta

        if (xhr.status >= 200 && xhr.status < 400) {
            try {
                var unidadesDidacticas = JSON.parse(xhr.responseText);
                var selectUnidadDidactica = document.getElementById('unidad_didactica');
                // Limpiar opciones anteriores
                selectUnidadDidactica.innerHTML = '';
                // Agregar opción predeterminada
                var option = document.createElement('option');
                option.value = '';
                option.textContent = 'Selecciona una Unidad Didactica';
                selectUnidadDidactica.appendChild(option);

                // Agregar las opciones de unidades didácticas obtenidas
                unidadesDidacticas.forEach(function(unidad) {
                    var option = document.createElement('option');
                    option.value = unidad.id_unidad_didactica;
                    option.textContent = unidad.nombre;
                    selectUnidadDidactica.appendChild(option);
                });

                // Mostrar el div de unidades didácticas si hay opciones disponibles
                document.getElementById('div_unidad_didactica').style.display = unidadesDidacticas.length > 0 ? 'block' : 'none';
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error al cargar las unidades didácticas. Estado HTTP:', xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error('Error de red al cargar las unidades didácticas.');
    };

    xhr.send();
}

</script>


<script>

//para los itemsssss

document.getElementById('add-item').addEventListener('click', function() {
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

    document.querySelector('table tbody').insertAdjacentHTML('beforeend', newRow);
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-item')) {
        event.target.closest('tr').remove();
    }
});
</script>
</body>
</html>
