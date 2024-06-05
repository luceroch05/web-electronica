<h1>Crear salon</h1>
    <form action="index.php?controller=salon&action=store" method="POST">
        <label for="nombre_salon">Nombre:</label>
        <input type="text" id="nombre_salon" name="nombre_salon" required><br>

        <input type="submit" value="Crear">
    </form>
    <a href="index.php?controller=salon&action=index">Volver a las lista de salones</a>