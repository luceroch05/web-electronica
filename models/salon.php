<?php 
require_once 'database.php';
class Salon{

    public static function all(){
        global  $conexion;
        $result= $conexion->query("SELECT * from salon");
        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    public static function find($id){
        global $conexion;
        $stmt=$conexion->prepare("SELECT * FROM salon WHERE id_salon=?");
        stmt->bind_param("i",$id);
        stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data){
        global $conexion;
        $stmt=$conexion->prepare("INSERT INTO salon(nombre_salon VALUES (?)");
        $stmt->bind_param("s",$data['nombre_salon']);
        stmt->execute();
    }
    public static function update($id, $data) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE salon SET  nombre_salon=? WHERE id_salon = ?");
        $stmt->bind_param("ssisssssii",$data['nombre_saloin'], $id);
        $stmt->execute();
    }

    public static function delete($id) {
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM salon WHERE id_salon = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }


}



?>