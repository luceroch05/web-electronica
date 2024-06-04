<?php
require_once 'controllers/ItemController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'item';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'item':
        $controller = new ItemController();
        break;

        case 'profesor':
            $controller = new ProfesorController();
            break;
    case 'curso':
            $controller= new CursoController();
    case 'categoria':
            $controller=new CategoriaController();
    case 'prestamo':
        $controller=new PrestamoController(); 
    case 'reserva':
        $controller=new ReservaController();
    case 'ubicacion':
        $controller=new UbicacionController();
    case 'salon':
        $controller= new SalonController();
    case 'unidad_didactica':
        $controller=new UnidadDidacticaController();
    case 'usuario':
        $controller=new UsuarioController();           
    case 'rol':
        $controller=new RolController();
    case 'detalle':
        $controller=new DetalleReservaItemController();
            // Otros controladores
}


$controller->{$action}();


?>

