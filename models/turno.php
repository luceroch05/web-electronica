<?php
require_once 'database.php';

class Turno {
    private static $conexion;

    public static function init() {
        self::$conexion = $GLOBALS['conexion'];
    }

    public static function all() {
        $result = self::$conexion->query("SELECT * FROM turno");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

Turno::init();

?>