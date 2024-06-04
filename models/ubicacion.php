<?php
require_once 'database.php';

class Ubicacion {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM ubicacion");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM ubicacion WHERE id_ubicacion = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO ubicacion (id_salon, nombre_armario) VALUES (?, ?)");
        $stmt->bind_param("is", $data['id_salon'], $data['nombre_armario']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE ubicacion SET id_salon = ?, nombre_armario = ? WHERE id_ubicacion = ?");
        $stmt->bind_param("isi", $data['id_salon'], $data['nombre_armario'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM ubicacion WHERE id_ubicacion = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
