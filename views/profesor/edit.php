<div class="container">
    <h2>Actualizar Profesor</h2>
    <form action="index.php?controller=profesor&action=update&id=<?php echo $profesor['id_profesor']; ?>" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $profesor['nombre']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Profesor</button>
    </form>
</div>
