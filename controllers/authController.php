<?php
require_once 'models/usuario.php';

class AuthController {

    public function login() {
        $view = 'views/auth/login.php';
        require_once 'views/layout.php';
    }


    public function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_usuario = $_POST['nombre_usuario'];
            $password = $_POST['password'];
    
            $user = Usuario::findByUsername($nombre_usuario);
    
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['username'] = $user['nombre_usuario'];
                $_SESSION['role'] = $user['id_rol'];
                header('Location: index.php?controller=item&action=index');
                exit;
            } else {
                // Mostrar un mensaje de error y redirigir al formulario de inicio de sesión
                $error = "Invalid username or password";
                $view = 'views/auth/login.php';
                require_once 'views/layout.php';
            }
        }
    }
    
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
        exit;
    }
}
?>
