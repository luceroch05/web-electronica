<?php
require_once 'controllers/CategoriaController.php';
require_once 'controllers/ProfesorController.php';
require_once 'controllers/detalle_reserva_item.php;
require_once 'controllers/ItemController.php';
require_once 'controllers/PrestamoController.php';
require_once 'controllers/ReservaController.php';
require_once 'controllers/RolController.php';
require_once 'controllers/SalonController.php';
require_once 'controllers/UbicacionController.php';
require_once 'controllers/UnidadDidacticaController.php';
require_once 'controllers/UsuarioController.php';

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

}

switch ($action) {

    case 'index' :
    $controller->index();
    break;

    case 'edit':
    $id = $_GET['id'];
    $controller->edit($id);
    break;

    case 'create':
    $controller->create();
     break;

    case 'update':
    $id = $_GET['id'];
    $controller->update($id);
    break; 

    case 'store':
    $controller->store();
    break;

    case 'delete':
    $id = $_GET['id'];
    $controller->delete($id);
    break;

}


?>

