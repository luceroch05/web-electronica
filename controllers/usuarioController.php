<?php
require_once 'models/usuario.php';
require_once 'models/profesor.php';

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

    public function create_two() {
        session_start();
        if (!isset($_SESSION['id_rol'])) {
            // Si no hay rol en la sesión, redirigir a la página de creación inicial
            header('Location: index.php?controller=usuario&action=create');
            exit();
        }
        $view = 'views/usuario/create-two.php';
        require_once 'views/layout.php';
    }

    public function store() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Guardar el rol en la sesión
            $_SESSION['id_rol'] = $_POST['id_rol'];

            // Redirigir al siguiente formulario
            header('Location: index.php?controller=usuario&action=create_two');
            exit(); // Importante salir después de la redirección
        }
    }

    public function store_two() {
        session_start();

        if (!isset($_SESSION['id_rol'])) {
            // Si no hay rol en la sesión, redirigir a la página de creación inicial
            header('Location: index.php?controller=usuario&action=create');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar datos del formulario de create-two.php
            $nombre_usuario = $_POST['nombre_usuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'nombre_usuario' => $nombre_usuario,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'password' => $hashed_password,
                'id_rol' => $_SESSION['id_rol']
            ];

            $lastInsertId = Usuario::create($data);

            // Si el rol es '2' (Asistente), guarda los datos adicionales
            if ($_SESSION['id_rol'] == '2') {
                $id_usuario =   $lastInsertId;
                $turno = $_POST['turno'];
                $salon = $_POST['salon'];

                $asistente_data = [
                    'id_usuario' => $id_usuario,
                    'id_turno' => $turno,
                    'id_salon' => $salon
                ];

                Asistente::create($asistente_data);
            }
            else{

                $id_usuario =  $lastInsertId;
                $profesor_data = [
                    'id_usuario' => $id_usuario
                ];

                Profesor::create($profesor_data);

                header('Location: index.php?controller=usuario&action=index');

            }

            // Limpiar los datos de la sesión
            session_unset();
            session_destroy();

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
