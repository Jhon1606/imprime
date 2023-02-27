<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class estado extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($descripcion,$usuario){
    $statement=$this->conexion->prepare("INSERT INTO estado (descripcion,usuario)
                                        VALUES(:descripcion,:usuario)");
    $statement->bindParam(':descripcion',$descripcion);
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
        $statement=$this->conexion->prepare("SELECT * FROM estado");
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
        $statement=$this->conexion->prepare("SELECT * FROM estado WHERE id_estado=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$descripcion){
        $statement=$this->conexion->prepare("UPDATE estado SET descripcion=:descripcion
                                            WHERE id_estado = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':descripcion',$descripcion);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM estado WHERE id_estado = :id");
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