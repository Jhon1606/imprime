<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class producto extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$nombre,$id_categoria,$precio_venta,$precio_costo,$id_unidad,$prod_compuesto,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO producto (codigo,nombre,id_categoria,precio_venta,precio_costo,id_unidad,es_producto_compuesto,usuario)
                                            VALUES(:codigo,:nombre,:id_categoria,:precio_venta,:precio_costo,:id_unidad,:prod_compuesto,:usuario)");
        $statement->bindParam(':codigo',$codigo);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':id_categoria',$id_categoria);
        $statement->bindParam(':precio_venta',$precio_venta);
        $statement->bindParam(':precio_costo',$precio_costo);
        $statement->bindParam(':id_unidad',$id_unidad);
        $statement->bindParam(':prod_compuesto',$prod_compuesto);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function addPrecio($id_producto,$referencia,$precio_venta,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO producto_precio (id_producto,referencia,precio_venta,usuario)
                                            VALUES(:id_producto,:referencia,:precio_venta,:usuario)");
        $statement->bindParam(':id_producto',$id_producto);
        $statement->bindParam(':referencia',$referencia);
        $statement->bindParam(':precio_venta',$precio_venta);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function addInsumo($id_insumo,$id_producto,$id_unidad,$cantidad,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO producto_insumo (id_insumo,id_producto,id_unidad,cantidad,usuario)
                                            VALUES(:id_insumo,:id_producto,:id_unidad,:cantidad,:usuario)");
        $statement->bindParam(':id_insumo',$id_insumo);
        $statement->bindParam(':id_producto',$id_producto);
        $statement->bindParam(':id_unidad',$id_unidad);
        $statement->bindParam(':cantidad',$cantidad);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/insumo.php');
        }else{
            header('Location: ../Vista/index.php');
        }
    }

    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM producto WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id_producto, a.codigo, a.nombre, b.nombre_categoria AS categoria, a.precio_venta,
                                             a.precio_costo, c.nombre_unidad AS unidad, a.es_producto_compuesto, a.estado
                                             FROM producto AS a 
                                             INNER JOIN categoria AS b ON a.id_categoria = b.id_categoria
                                             INNER JOIN unidad AS c ON a.id_unidad = c.id_unidad ORDER BY id_producto");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getPrecio($id_producto){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM producto_precio WHERE id_producto = :id_producto");
        $statement->bindParam(":id_producto",$id_producto);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getInsumo(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM insumo");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getInsumos($id_producto){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id_compuesto, b.nombre AS insumo, a.id_producto,
                                            c.nombre_unidad AS unidad, a.cantidad  
                                            FROM producto_insumo AS a 
                                            INNER JOIN insumo AS b ON a.id_insumo = b.id_insumo
                                            INNER JOIN unidad AS c ON a.id_unidad = c.id_unidad
                                            WHERE id_producto = :id_producto");
        $statement->bindParam(":id_producto",$id_producto);
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
        $statement=$this->conexion->prepare("SELECT * FROM producto WHERE id_producto=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$codigo,$nombre,$id_categoria,$precio_venta,$precio_costo,$id_unidad,$prod_compuesto){
        $statement=$this->conexion->prepare("UPDATE producto SET codigo=:codigo, nombre=:nombre, id_categoria=:id_categoria, precio_venta=:precio_venta,
                                            precio_costo=:precio_costo, id_unidad=:id_unidad, es_producto_compuesto=:prod_compuesto WHERE id_producto = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':nombre',$nombre);
         $statement->bindParam(':id_categoria',$id_categoria);
         $statement->bindParam(':precio_venta',$precio_venta);
         $statement->bindParam(':precio_costo',$precio_costo);
         $statement->bindParam(':id_unidad',$id_unidad);
         $statement->bindParam(':prod_compuesto',$prod_compuesto);
        
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM producto WHERE id_producto = :id");
        $statement->bindParam(":id",$id);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function deletePrecio($id){
        $statement=$this->conexion->prepare("DELETE FROM producto_precio WHERE id_precio = :id");
        $statement->bindParam(":id",$id);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function deleteInsumo($id){
        $statement=$this->conexion->prepare("DELETE FROM producto_insumo WHERE id_compuesto = :id");
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