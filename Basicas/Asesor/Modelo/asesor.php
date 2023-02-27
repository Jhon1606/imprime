<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class asesor extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($nombre,$correo,$telefono,$usuario){
    $statement=$this->conexion->prepare("INSERT INTO asesor (nombre,correo,telefono,usuario)
                                        VALUES(:nombre,:correo,:telefono,:usuario)");
    $statement->bindParam(':nombre',$nombre);
    $statement->bindParam(':correo',$correo);
    $statement->bindParam(':telefono',$telefono);
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
        $statement=$this->conexion->prepare("SELECT * FROM asesor");
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
        $statement=$this->conexion->prepare("SELECT * FROM asesor WHERE id=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$nombre,$correo,$telefono){
        $statement=$this->conexion->prepare("UPDATE asesor SET nombre=:nombre, 
                                           correo=:correo, telefono=:telefono WHERE id = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':nombre',$nombre);
         $statement->bindParam(':correo',$correo);
         $statement->bindParam(':telefono',$telefono);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM asesor WHERE id = :id");
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