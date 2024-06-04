<?php
require_once 'database.php';

class Categoria {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM categoria");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO categoria (nombre_categoria) VALUES (?)");
        $stmt->bind_param("s", $data['nombre_categoria']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE categoria SET nombre_categoria = ? WHERE id_categoria = ?");
        $stmt->bind_param("si", $data['nombre_categoria'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
