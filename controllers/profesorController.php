<?php
require_once 'models/profesor.php';

class ProfesorController {

    public function index() {
        $profesores = Profesor::all();
        $view = 'views/profesores/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $profesor = Profesor::find($id);
        $view = 'views/profesores/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/profesores/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre' => $_POST['nombre']
            ];
            Profesor::create($data);
            header('Location: index.php?controller=profesor&action=index');
            exit;
        }
    }

    public function edit($id) {
        $profesor = Profesor::find($id);
        $view = 'views/profesores/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre' => $_POST['nombre']
            ];
            Profesor::update($id, $data);
            header('Location: index.php?controller=profesor&action=index');
            exit;
        }
    }

    public function delete($id) {
        Profesor::delete($id);
        header('Location: index.php?controller=profesor&action=index');
        exit;
    }
}
?>
