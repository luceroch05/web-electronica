<h1>Crear Ubicación</h1>
    <form action="index.php?controller=ubicacion&action=store" method="POST">
        <label for="id_salon">ID del Salón:</label>
        <input type="text" id="id_salon" name="id_salon" required><br>

        <label for="nombre_armario">Nombre del Armario:</label>
        <input type="text" id="nombre_armario" name="nombre_armario" required><br>

        <input type="submit" value="Crear">
    </form>
    <a href="index.php?controller=ubicacion&action=index">Volver a la lista de ubicaciones</a>