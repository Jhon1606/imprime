<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class persona extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($identificacion,$nombre,$telefono,$correo,$proceso,$usuario){
    $statement=$this->conexion->prepare("INSERT INTO persona (identificacion,nombre,telefono,correo,id_proceso,usuario)
                                        VALUES(:identificacion,:nombre,:telefono,:correo,:proceso,:usuario)");
    $statement->bindParam(':identificacion',$identificacion);
    $statement->bindParam(':nombre',$nombre);
    $statement->bindParam(':telefono',$telefono);
    $statement->bindParam(':correo',$correo);
    $statement->bindParam(':proceso',$proceso);
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
        $statement=$this->conexion->prepare("SELECT a.id_persona, a.identificacion, a.nombre, a.telefono, a.correo, 
                                            b.nombre_proceso AS proceso, a.estado
                                            FROM persona AS a
                                            INNER JOIN proceso AS b ON a.id_proceso = b.id_proceso");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getProceso(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM proceso");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function existe($identificacion){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM persona WHERE identificacion = :identificacion");
        $statement->bindParam(":identificacion",$identificacion);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }
  

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM persona WHERE id_persona=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$identificacion,$nombre,$telefono,$correo,$proceso){
        $statement=$this->conexion->prepare("UPDATE persona SET identificacion=:identificacion, nombre=:nombre, 
                                           telefono=:telefono, correo=:correo, id_proceso=:proceso  WHERE id_persona = :id");

        $statement->bindParam(':id',$id);
        $statement->bindParam(':identificacion',$identificacion);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':telefono',$telefono);
        $statement->bindParam(':correo',$correo);
        $statement->bindParam(':proceso',$proceso);
         
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