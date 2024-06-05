<?php
require_once 'database.php';

class Reserva {
    private static $conexion;

    public static function init() {
        self::$conexion = $GLOBALS['conexion'];
    }

    public static function all() {
        $result = self::$conexion->query("SELECT * FROM reserva");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$conexion->prepare("SELECT * FROM reserva WHERE id_reserva = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        $stmt = self::$conexion->prepare("INSERT INTO reserva (fecha_reserva, fecha_prestamo, hora_reserva, id_profesor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $data['fecha_reserva'], $data['fecha_prestamo'], $data['hora_reserva'], $data['id_profesor']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        $stmt = self::$conexion->prepare("UPDATE reserva SET fecha_reserva = ?, fecha_prestamo = ?, hora_reserva = ?, id_profesor = ? WHERE id_reserva = ?");
        $stmt->bind_param("sssii", $data['fecha_reserva'], $data['fecha_prestamo'], $data['hora_reserva'], $data['id_profesor'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $stmt = self::$conexion->prepare("DELETE FROM reserva WHERE id_reserva = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

Reserva::init();
?>
