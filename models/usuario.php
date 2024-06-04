<?php
require_once 'database.php';

class Usuario {

    public static function all() {
        global $conexion;
        $result = $conexion->query("SELECT * FROM usuario");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO usuario (nombre_usuario, password, id_rol) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['nombre_usuario'], $data['password'], $data['id_rol']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE usuario SET nombre_usuario = ?, password = ?, id_rol = ? WHERE id_usuario = ?");
        $stmt->bind_param("ssii", $data['nombre_usuario'], $data['password'], $data['id_rol'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
