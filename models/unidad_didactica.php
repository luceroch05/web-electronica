<?php
require_once 'database.php';

class UnidadDidactica {
    private static $conexion;

    public static function init() {
        self::$conexion = $GLOBALS['conexion'];
    }

    public static function all() {
        $result = self::$conexion->query("SELECT * FROM unidad_didactica");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$conexion->prepare("SELECT * FROM unidad_didactica WHERE id_unidad_didactica = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        $stmt = self::$conexion->prepare("INSERT INTO unidad_didactica (nombre, ciclo, id_profesor) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['nombre'], $data['ciclo'], $data['id_profesor']);
        return $stmt->execute();
    }

    public static function update($id, $data) {
        $stmt = self::$conexion->prepare("UPDATE unidad_didactica SET nombre = ?, ciclo = ?, id_profesor = ? WHERE id_unidad_didactica = ?");
        $stmt->bind_param("ssii", $data['nombre'], $data['ciclo'], $data['id_profesor'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $stmt = self::$conexion->prepare("DELETE FROM unidad_didactica WHERE id_unidad_didactica = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

UnidadDidactica::init();
?>
