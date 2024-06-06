<h1>Crear Ubicación</h1>
    <form action="index.php?controller=ubicacion&action=store" method="POST">
    <div class="mb-3">
            <label for="id_salon" class="form-label">ID del Salón:</label>
            <select class="form-select" id="id_salon" name="id_salon" required>
                <option value="" selected disabled>Selecciona un salón</option>
                <?php foreach ($salones as $salon): ?>
                    <option value="<?php echo $salon['id_salon']; ?>"><?php echo $salon['nombre_salon']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <label for="nombre_armario">Nombre del Armario:</label>
        <input type="text" id="nombre_armario" name="nombre_armario" required><br>

        <input type="submit" value="Crear">
    </form>
    <a href="index.php?controller=ubicacion&action=index">Volver a la lista de ubicaciones</a>