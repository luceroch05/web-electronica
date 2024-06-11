<?php
require_once 'models/categoria.php';

class ItemController {

    public function index() {

 // Obtener el parámetro de la categoría seleccionada
 $categoria_id = isset($_GET['categoria_id']) ? $_GET['categoria_id'] : null;
 $categoria = Categoria::getItemsByCategoria($categoria_id);

 if ($categoria) {
    // Obtener los items correspondientes a esta categoría
    $items = Categoria::getItemsByCategoria($categoria_id);
    // Renderizar la vista con los resultados
    $view = 'views/item/index.php';
    require_once 'views/layout.php';
} else {
    // La categoría no existe, mostrar un mensaje de error o redirigir a otra página
    echo "La categoría no existe.";
}


}



    public function show($id) {
        $item = Item::find($id);
        $view = 'views/item/show.php';
        require_once 'views/layout.php';    
    }

    public function create() {
        $view = 'views/item/create.php';
        require_once 'views/layout.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'codigo_bci' => $_POST['codigo_bci'],
                'descripcion' => $_POST['descripcion'],
                'cantidad' => $_POST['cantidad'],
                'estado' => $_POST['estado'],
                'marca' => $_POST['marca'],
                'modelo' => $_POST['modelo'],
                'imagen' => $_POST['imagen'],
                'nro_inventariado' => $_POST['nro_inventariado'],
                'id_ubicacion' => $_POST['id_ubicacion'],
                'id_categoria' => $_POST['id_categoria']
            ];

            Item::create($data);

            header('Location: index.php?controller=item&action=index');
            exit;
        }
    }

    public function edit($id) {
        $item = Item::find($id);
        $view = 'views/item/edit.php';
        require_once 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'codigo_bci' => $_POST['codigo_bci'],
                'descripcion' => $_POST['descripcion'],
                'cantidad' => $_POST['cantidad'],
                'estado' => $_POST['estado'],
                'marca' => $_POST['marca'],
                'modelo' => $_POST['modelo'],
                'imagen' => $_POST['imagen'],
                'nro_inventariado' => $_POST['nro_inventariado'],
                'id_ubicacion' => $_POST['id_ubicacion'],
                'id_categoria' => $_POST['id_categoria']
            ];

            Item::update($id, $data);

            header('Location: index.php?controller=item&action=index');
            exit;
        }
    }

    public function delete($id) {
        Item::delete($id);
        header('Location: index.php?controller=item&action=index');
        exit;
    }
}
?>
