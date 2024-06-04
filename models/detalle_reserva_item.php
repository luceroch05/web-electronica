<?php
require_once 'database.php';

class DetalleReservaItem {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM detalle_reserva_item");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM detalle_reserva_item WHERE id_detalle = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO detalle_reserva_item (id_reserva, id_item) VALUES (?, ?)");
        $stmt->bind_param("ii", $data['id_reserva'], $data['id_item']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE detalle_reserva_item SET id_reserva = ?, id_item = ? WHERE id_detalle = ?");
        $stmt->bind_param("iii", $data['id_reserva'], $data['id_item'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM detalle_reserva_item WHERE id_detalle = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
