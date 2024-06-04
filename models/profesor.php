<?php
require_once 'database.php';

class Profesor {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM profesor");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM profesor WHERE id_profesor = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO profesor (nombre) VALUES (?)");
        $stmt->bind_param("s", $data['nombre']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE profesor SET nombre = ? WHERE id_profesor = ?");
        $stmt->bind_param("si", $data['nombre'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM profesor WHERE id_profesor = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
