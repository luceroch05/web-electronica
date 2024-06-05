<div class="container">
    <h2>Crear Item</h2>
    <form action="index.php?controller=item&action=store" method="POST">
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
        <!-- Agrega aquí los demás campos del formulario según tus necesidades -->
        <button type="submit" class="btn btn-primary">Crear Item</button>
    </form>
</div>
