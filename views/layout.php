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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">SISTEMA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=ubicacion&action=index">Ubicación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=salon&action=index">Salones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=prestamo&action=index">Préstamo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=profesor&action=index">Profesor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=reserva&action=index">Reserva</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=categoria&action=index">Categoría</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=unidad_didactica&action=index">Unidad Didáctica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=usuario&action=index">Usuarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=detalle_reserva_item&action=index">Detalle Reserva Item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=asistente&action=index">Asistentes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-4">
        <?php include($view); ?>
    </main>
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Inventariado</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


