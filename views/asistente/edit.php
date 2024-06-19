<div class="container">
    <h2>Actualizar Asistente</h2>
    <form action="index.php?controller=asistente&action=update&id=<?php echo $usuario['id_usuario']; ?>" method="POST">
        <div class="form-group">
            <label for="nombre_usuario">Usuario:</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $usuario['nombre_usuario']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellido:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>
        </div>
        <div class="form-group">
            <label for="turno">Turno:</label>
            <select class="form-control" id="id_turno" name="turno" required>
                <option value="" disabled>Selecciona un turno</option>
                <?php foreach ($turnos as $turno): ?>
                    <option value="<?php echo $turno['id_turno']; ?>" <?php echo $turno['id_turno'] == $asistente['id_turno'] ? 'selected' : ''; ?>>
                        <?php echo $turno['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="salon">Salón:</label>
            <input type="text" class="form-control" id="salon" name="salon" value="<?php echo $asistente['id_salon']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Asistente</button>
    </form>
</div>
