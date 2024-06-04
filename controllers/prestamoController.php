<?php
require_once 'models/prestamo.php';

class PrestamoController {

    public function index() {
        $prestamos = Prestamo::all();
        $view = 'views/prestamos/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $prestamo = Prestamo::find($id);
        $view = 'views/prestamos/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/prestamos/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'id_reserva' => $_POST['id_reserva'],
                'hora' => $_POST['hora'],
                'fecha' => $_POST['fecha']
            ];
            Prestamo::create($data);
            header('Location: index.php?controller=prestamo&action=index');
            exit;
        }
    }

    public function edit($id) {
        $prestamo = Prestamo::find($id);
        $view = 'views/prestamos/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'id_reserva' => $_POST['id_reserva'],
                'hora' => $_POST['hora'],
                'fecha' => $_POST['fecha']
            ];
            Prestamo::update($id, $data);
            header('Location: index.php?controller=prestamo&action=index');
            exit;
        }
    }

    public function delete($id) {
        Prestamo::delete($id);
        header('Location: index.php?controller=prestamo&action=index');
        exit;
    }
}
?>
