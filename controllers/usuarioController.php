<?php
require_once 'models/usuario.php';

class UsuarioController {

    public function index() {
        $usuarios = Usuario::all();
        $view = 'views/usuario/index.php';
        require_once 'views/layout.php';
    }

    public function show($id) {
        $usuario = Usuario::find($id);
        $view = 'views/usuario/show.php';
        require_once 'views/layout.php';
    }

    public function create() {
        $view = 'views/usuario/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_usuario = $_POST['nombre_usuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $id_rol = $_POST['id_rol'];
    
            $data = [
                'nombre_usuario' => $nombre_usuario,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'password' => $hashed_password,
                'id_rol' => $id_rol
            ];
    
            Usuario::create($data);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }
    }
    
    

    public function edit($id) {
        $usuario = Usuario::find($id);
        $view = 'views/usuario/edit.php';
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
