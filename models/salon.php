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
        stmt->bind_param("id",$id);
        stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data){
        global $conexion;
        $stmt=$conexion->prepare("INSERT INTO salon(id_Sa")
    }


}





?>