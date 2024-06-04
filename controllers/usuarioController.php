<?php
require_once 'models/usuario.php';

class UsuarioController {

    public function index() {
        $usuarios = Usuario::all();
        $view = 'views/usuarios/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $usuario = Usuario::find($id);
        $view = 'views/usuarios/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/usuarios/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre_usuario' => $_POST['nombre_usuario'],
                'password' => $_POST['password'],
                'id_rol' => $_POST['id_rol']
            ];
            Usuario::create($data);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        $view = 'views/usuarios/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nombre_usuario' => $_POST['nombre_usuario'],
                'password' => $_POST['password'],
                'id_rol' => $_POST['id_rol']
            ];
            Usuario::update($id, $data);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }
    }

    public function delete($id) {
        Usuario::delete($id);
        header('Location: index.php?controller=usuario&action=index');
        exit;
    }
}
?>
