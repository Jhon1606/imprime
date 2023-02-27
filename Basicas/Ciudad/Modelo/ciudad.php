<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class ciudad extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($id_departamento,$nombre_ciudad){
    $statement=$this->conexion->prepare("INSERT INTO ciudad (id_departamento,nombre_ciudad)
                                        VALUES(:id_departamento,:nombre_ciudad)");
    $statement->bindParam(':id_departamento',$id_departamento);
    $statement->bindParam(':nombre_ciudad',$nombre_ciudad);
    if($statement->execute()){
        create_flash_message("Exitoso", "Registro exitoso","success");
        header('Location: ../Vista/index.php');
    }else{
        create_flash_message("Error", "Error al registrar","error");
        header('Location: ../Vista/index.php');
    }

    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id_ciudad, b.nombre_departamento AS departamento, a.nombre_ciudad 
                                            FROM ciudad AS a
                                            INNER JOIN departamento AS b 
                                            WHERE a.id_departamento = b.id_departamento");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getDepartamento(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM departamento");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    // public function existe($codigo){
    //     $statement = $this->conexion->prepare("SELECT COUNT(*) FROM ubicacion WHERE codigo = :codigo");
    //     $statement->bindParam(":codigo",$codigo);
    //     $statement->execute();
    //     if($statement->fetchColumn()>0){
    //         create_flash_message("Error", "El código existe","error");
    //         header('Location: ../Vista/index.php');
    //     }
    //     return false;
    // }

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ciudad WHERE id_ciudad=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$id_departamento,$nombre_ciudad){
        $statement=$this->conexion->prepare("UPDATE ciudad SET  id_departamento=:id_departamento, nombre_ciudad=:nombre_ciudad 
                                            WHERE id_ciudad = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':id_departamento',$id_departamento);
         $statement->bindParam(':nombre_ciudad',$nombre_ciudad);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM ciudad WHERE id_ciudad = :id");
        $statement->bindParam(":id",$id);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }
}

?>