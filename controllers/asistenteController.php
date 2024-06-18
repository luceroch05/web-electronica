<?php
require_once 'models/asistente.php';
require_once 'models/usuario.php';
require_once 'models/turno.php';

class AsistenteController {

    public function index() {
        $asistentes = Asistente::all();

        $datos_asistente= [];

        foreach ($asistentes as $asistente){
            $usuario = Usuario::find($asistente['id_usuario']);
            if($usuario){

                $turno = Turno::find($asistente['id_turno']);

                $datos_asistente[] = [
                    'id_asistente' => $asistente['id_asistente'],
                    'nombre_usuario' => $usuario['nombre_usuario'],
                    'nombre' => $usuario['nombre'],
                    'apellidos' => $usuario['apellidos'],
                    'nombre_turno' => $turno['nombre'],
                ];
            }
            else{

            }

        }



        $view = 'views/asistente/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $profesor = Profesor::find($id);
        $view = 'views/profesor/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/profesor/create.php';
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
        $view = 'views/profesor/edit.php';
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