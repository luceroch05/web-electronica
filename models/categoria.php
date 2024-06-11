<?php
require_once 'database.php';

class Categoria {
    private static $conexion;

    public static function init() {
        self::$conexion = $GLOBALS['conexion'];
    }

    public static function all() {
        $result = self::$conexion->query("SELECT * FROM categoria");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$conexion->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        $stmt = self::$conexion->prepare("INSERT INTO categoria (nombre_categoria) VALUES (?)");
        $stmt->bind_param("s", $data['nombre_categoria']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        $stmt = self::$conexion->prepare("UPDATE categoria SET nombre_categoria = ? WHERE id_categoria = ?");
        $stmt->bind_param("si", $data['nombre_categoria'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $stmt = self::$conexion->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function getItemsByCategoria($id){
        $stmt = self::$conexion->prepare("SELECT * FROM item WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
            return $items;
        } else {
            return []; 
        }
    }
    
}

Categoria::init();
?>
