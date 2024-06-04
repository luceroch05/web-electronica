<?php
require_once 'models/reserva.php';

class ReservaController {

    public function index() {
        $reservas = Reserva::all();
        $view = 'views/reservas/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $reserva = Reserva::find($id);
        $view = 'views/reservas/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/reservas/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'fecha_reserva' => $_POST['fecha_reserva'],
                'fecha_prestamo' => $_POST['fecha_prestamo'],
                'hora_reserva' => $_POST['hora_reserva'],
                'id_profesor' => $_POST['id_profesor']
            ];
            Reserva::create($data);
            header('Location: index.php?controller=reserva&action=index');
            exit;
        }
    }

    public function edit($id) {
        $reserva = Reserva::find($id);
        $view = 'views/reservas/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'fecha_reserva' => $_POST['fecha_reserva'],
                'fecha_prestamo' => $_POST['fecha_prestamo'],
                'hora_reserva' => $_POST['hora_reserva'],
                'id_profesor' => $_POST['id_profesor']
            ];
            Reserva::update($id, $data);
            header('Location: index.php?controller=reserva&action=index');
            exit;
        }
    }

    public function delete($id) {
        Reserva::delete($id);
        header('Location: index.php?controller=reserva&action=index');
        exit;
    }
}
?>
