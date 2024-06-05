<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inventariado</title>

</head>
<body>
    <header>
        <h1>Inventariado</h1>
        <nav>
            <a href="index.php?controller=ubicacion&action=index">Ubicacion</a>
            <a href="index.php?controller=salon&action=index">Salones</a>
            <a href="index.php?controller=prestamo&action=index">Prestamo</a>
            <a href="index.php?controller=profesor&action=index">Profesor</a>
            <a href="index.php?controller=reserva&action=index">Reserva</a>
            <a href="index.php?controller=categoria&action=index">Categoria</a>
            <a href="index.php?controller=unidad_didactica&action=index">Unidad Didactica</a>
            <a href="index.php?controller=usuario&action=index">Usuario</a>
            <a href="index.php?controller=rol&action=index">Rol</a>

        </nav>
    </header>
    <main>
        <?php include($view); ?>
    </main>
    <footer>
        <p>&copy; 2023 Inventariado</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
