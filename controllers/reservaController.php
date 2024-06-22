<?php
require_once 'models/item.php';

require_once 'models/reserva.php';
require_once 'models/unidad_didactica.php';
require_once 'models/detalle_reserva_item.php';

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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $selectedItems = $_POST['items']; // Suponiendo que los items se envían como un array de IDs

            $data = [
                'fecha_prestamo' => $_POST['fecha_prestamo'],
                'id_unidad_didactica' => $_POST['unidad_didactica'],
                'id_profesor' => $_POST['id_profesor'],
            ];
    
            // Crear la reserva
            $reserva = Reserva::create($data);


            foreach ($selectedItems as $itemId) {

                $itemsPedidos = Item::find($itemId);
                $id_ubicacion = $itemsPedidos['id_ubicacion'];
                $ubicacion = Ubicacion::find($id_ubicacion);
                $id_salon = Salon::find($ubicacion['id_salon']);
                
            


                // Crear un nuevo detalle_reserva_item para cada item seleccionado
                DetalleReservaItem::create([

                    'reserva_id' => $reserva->id,
                    'item_id' => $itemId,
                ]);
            }



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
            $unidades = UnidadDidactica::findUnidadDidacticaByCiclo($ciclo);
            if ($unidades !== false) {
                echo json_encode($unidades);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }
    
    
}
?>
