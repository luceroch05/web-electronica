<?php
require_once 'models/item.php';

require_once 'models/reserva.php';
require_once 'models/unidad_didactica.php';

class ReservaController {

    public function index() {
        $reservas = Reserva::all();
        $view = 'views/reservA/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $reserva = Reserva::find($id);
        $view = 'views/reserva/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $items = Item::all();
        $unidades_didactica = UnidadDidactica::all();

        $view = 'views/reserva/create.php';
        require_once 'views/layout.php';
    }

    public function store() {

        $items = Item::all();

        
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
        $view = 'views/reserva/edit.php';
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

    public function obtener_unidad_didactica() {
        header('Content-Type: application/json');
        if (isset($_GET['ciclo'])) {
            $ciclo = $_GET['ciclo'];
            $unidades_didactica = UnidadDidactica::findUnidadDidacticaByCiclo($ciclo);
            if ($unidades_didactica !== false) {
                echo json_encode($unidades_didactica);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }
    
}
?>
