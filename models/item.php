<?php
require_once 'database.php';

class Item {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM item");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM item WHERE id_item = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO item (codigo_bci, descripcion, cantidad, estado, marca, modelo, imagen, id_ubicacion, nro_inventariado, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissssssi", $data['codigo_bci'], $data['descripcion'], $data['cantidad'], $data['estado'], $data['marca'], $data['modelo'], $data['imagen'], $data['id_ubicacion'], $data['nro_inventariado'], $data['id_categoria']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE item SET codigo_bci = ?, descripcion = ?, cantidad = ?, estado = ?, marca = ?, modelo = ?, imagen = ?, id_ubicacion = ?, nro_inventariado = ?, id_categoria = ? WHERE id_item = ?");
        $stmt->bind_param("ssissssssi", $data['codigo_bci'], $data['descripcion'], $data['cantidad'], $data['estado'], $data['marca'], $data['modelo'], $data['imagen'], $data['id_ubicacion'], $data['nro_inventariado'], $data['id_categoria'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM item WHERE id_item = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
