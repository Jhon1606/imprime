<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class insumo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$nombre,$id_categoria,$precio_costo,$id_unidad,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO insumo (codigo,nombre,id_categoria,precio_costo,id_unidad,usuario)
                                            VALUES(:codigo,:nombre,:id_categoria,:precio_costo,:id_unidad,:usuario)");
        $statement->bindParam(':codigo',$codigo);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':id_categoria',$id_categoria);
        $statement->bindParam(':precio_costo',$precio_costo);
        $statement->bindParam(':id_unidad',$id_unidad);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM insumo WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id_insumo, a.codigo, a.nombre, b.nombre_categoria AS categoria,
                                             a.precio_costo, c.nombre_unidad AS unidad, a.estado
                                             FROM insumo AS a 
                                             INNER JOIN categoria AS b ON a.id_categoria = b.id_categoria
                                             INNER JOIN unidad AS c ON a.id_unidad = c.id_unidad ORDER BY id_insumo");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getCategoria(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM categoria");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getUnidad(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM unidad");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM insumo WHERE id_insumo=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$codigo,$nombre,$id_categoria,$precio_costo,$id_unidad){
        $statement=$this->conexion->prepare("UPDATE insumo SET codigo=:codigo, nombre=:nombre, id_categoria=:id_categoria,
                                            precio_costo=:precio_costo, id_unidad=:id_unidad WHERE id_insumo = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':nombre',$nombre);
         $statement->bindParam(':id_categoria',$id_categoria);
         $statement->bindParam(':precio_costo',$precio_costo);
         $statement->bindParam(':id_unidad',$id_unidad);
        
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM insumo WHERE id_insumo = :id");
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