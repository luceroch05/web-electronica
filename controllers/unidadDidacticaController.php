<?php
require_once 'models/unidad_didactica.php';

class UnidadDidacticaController {

    public function index() {
        $unidadesDidacticas = UnidadDidactica::all();
        $view = 'views/unidades_didacticas/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $unidadDidactica = UnidadDidactica::find($id);
        $view = 'views/unidades_didacticas/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/unidades_didacticas/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre' => $_POST['nombre'],
                'ciclo' => $_POST['ciclo'],
                'id_profesor' => $_POST['id_profesor']
            ];
            UnidadDidactica::create($data);
            header('Location: index.php?controller=unidadDidactica&action=index');
            exit;
        }
    }

    public function edit($id) {
        $unidadDidactica = UnidadDidactica::find($id);
        $view = 'views/unidades_didacticas/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre' => $_POST['nombre'],
                'ciclo' => $_POST['ciclo'],
                'id_profesor' => $_POST['id_profesor']
            ];
            UnidadDidactica::update($id, $data);
            header('Location: index.php?controller=unidadDidactica&action=index');
            exit;
        }
    }

    public function delete($id) {
        UnidadDidactica::delete($id);
        header('Location: index.php?controller=unidadDidactica&action=index');
        exit;
    }
}
?>
