<?php

require_once("../../../Helpers/alert.php");
require_once("../../../conexion.php");
session_start();


class usuarios extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function login($usuario,$password){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE user_id = :usuario AND clave = :contrasena");
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':contrasena',$password);
        $statement->execute();
        if ($statement->rowCount()==1){
            $result=$statement->fetch();
            $_SESSION['Nombre'] = $result["user_nombre"];
            $_SESSION['Id'] = $result["empleado"];
            $_SESSION['Perfil'] = $result["perfil"];
            $_SESSION['Usuario'] = $result["user_id"];
            return true;
        }
            // create_flash_message("Error", "Los datos son incorrectos","error");
            return false;
    }

    public function add($user_id,$user_nombre,$perfil,$clave){
        $statement=$this->conexion->prepare("INSERT INTO usuarios (user_id, user_nombre, perfil, clave)
                                            VALUES(:user_id, :user_nombre, :perfil, :clave)");
        $statement->bindParam(':user_id',$user_id);
        $statement->bindParam(':user_nombre',$user_nombre);
        $statement->bindParam(':perfil',$perfil);
        $statement->bindParam(':clave',$clave);
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
        $statement=$this->conexion->prepare("SELECT * FROM usuarios");
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
        $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE user_id=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($user_id,$user_nombre,$perfil){
        $statement=$this->conexion->prepare("UPDATE usuarios SET user_nombre=:user_nombre, 
                                            perfil=:perfil WHERE user_id = :user_id");

            $statement->bindParam(':user_id',$user_id);
            $statement->bindParam(':user_nombre',$user_nombre);
            $statement->bindParam(':perfil',$perfil);         
            if($statement->execute()){
                create_flash_message("Exitoso", "Registro exitoso","success");
                header('Location: ../Vista/index.php');
            }else{
                create_flash_message("Error", "Error al editar","error");
                header('Location: ../Vista/index.php');
            }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM usuarios WHERE user_id = :id");
        $statement->bindParam(":id",$id);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }       

    public function salir(){
        // $_SESSION['Id'] = null;
        // $_SESSION['Nombre'] = null;
        // $_SESSION['Perfil'] = null;
        session_start();
        session_destroy();
        header('Location: ../../../index.php');
    }
}
?>