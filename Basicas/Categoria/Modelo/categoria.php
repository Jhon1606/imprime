<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class categoria extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($nombre,$usuario){
    $statement=$this->conexion->prepare("INSERT INTO categoria (nombre_categoria,usuario)
                                        VALUES(:nombre,:usuario)");
    $statement->bindParam(':nombre',$nombre);
    $statement->bindParam(':usuario',$usuario);
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
        $statement=$this->conexion->prepare("SELECT * FROM categoria");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM categoria WHERE id_categoria=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$nombre){
        $statement=$this->conexion->prepare("UPDATE categoria SET nombre_categoria=:nombre
                                            WHERE id_categoria = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':nombre',$nombre);
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM categoria WHERE id_categoria = :id");
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