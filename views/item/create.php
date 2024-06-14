<div class="container">
    <h2>Crear Item</h2>
    <form action="index.php?controller=item&action=store" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="codigo_bci">Código BCI:</label>
            <input type="text" class="form-control" id="codigo_bci" name="codigo_bci" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="form-group">
            <label for="id_ubicacion">Ubicación:</label>
            <select class="form-control" id="id_ubicacion" name="id_ubicacion" required>
                <!-- Opciones de ubicaciones deben ser añadidas aquí -->
            </select>
        </div>
        <div class="form-group">
            <label for="nro_inventariado">Nro. Inventariado:</label>
            <input type="text" class="form-control" id="nro_inventariado" name="nro_inventariado" required>
        </div>


        <div class="form-group">
         

            <input type="hidden" name="id_categoria" value="<?php echo $categoria_id; ?>">
            </div>
        <button type="submit" class="btn btn-primary">Crear Item</button>
    </form>
</div>
