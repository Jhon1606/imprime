<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class cliente extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($identificacion,$nombre,$marca,$telefono,$correo,$direccion,$departamento,$ciudad,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO cliente (identificacion,nombre,marca,telefono,correo,direccion,departamento,ciudad,usuario)
                                            VALUES(:identificacion,:nombre,:marca,:telefono,:correo,:direccion,:departamento,:ciudad,:usuario)");
        $statement->bindParam(':identificacion',$identificacion);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':marca',$marca);
        $statement->bindParam(':telefono',$telefono);
        $statement->bindParam(':correo',$correo);
        $statement->bindParam(':direccion',$direccion);
        $statement->bindParam(':departamento',$departamento);
        $statement->bindParam(':ciudad',$ciudad);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function existe($identificacion){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM cliente WHERE identificacion = :identificacion");
        $statement->bindParam(":identificacion",$identificacion);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id_cliente, a.identificacion, a.nombre, a.marca, a.telefono,
                                             a.correo, a.direccion, b.nombre_departamento AS departamento, 
                                             c.nombre_ciudad AS ciudad, a.estado, a.usuario 
                                             FROM cliente AS a 
                                             INNER JOIN departamento AS b ON a.departamento = b.id_departamento
                                             INNER JOIN ciudad AS c ON a.ciudad = c.id_ciudad ORDER BY id_cliente");
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

    public function CiudadPorDepartamento($id){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ciudad WHERE id_departamento = :id");
        $statement->bindParam(':id',$id);
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
        $statement=$this->conexion->prepare("SELECT * FROM cliente WHERE id_cliente=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$identificacion,$nombre,$marca,$telefono,$correo,$direccion,$departamento,$ciudad){
        $statement=$this->conexion->prepare("UPDATE cliente SET identificacion=:identificacion, nombre=:nombre, marca=:marca,
                                            telefono=:telefono, correo=:correo, direccion=:direccion, departamento=:departamento, 
                                            ciudad=:ciudad WHERE id_cliente = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':identificacion',$identificacion);
         $statement->bindParam(':nombre',$nombre);
         $statement->bindParam(':marca',$marca);
         $statement->bindParam(':telefono',$telefono);
         $statement->bindParam(':correo',$correo);
         $statement->bindParam(':direccion',$direccion);
         $statement->bindParam(':departamento',$departamento);
         $statement->bindParam(':ciudad',$ciudad);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM cliente WHERE id_cliente = :id");
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