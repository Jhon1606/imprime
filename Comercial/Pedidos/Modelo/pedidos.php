<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class pedidos extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($numero_pedido,$fecha,$cliente,$fecha_aprobado,$fecha_entrega,$observaciones,$usuario){
        $statement=$this->conexion->prepare("INSERT INTO pedido (numero_pedido,fecha,cliente,fecha_aprobado,fecha_entrega,observaciones,usuario)
                                            VALUES(:numero_pedido,:fecha,:cliente,:fecha_aprobado,:fecha_entrega,:observaciones,:usuario)");
        $statement->bindParam(':numero_pedido',$numero_pedido);
        $statement->bindParam(':fecha',$fecha);
        $statement->bindParam(':cliente',$cliente);
        $statement->bindParam(':fecha_aprobado',$fecha_aprobado);
        $statement->bindParam(':fecha_entrega',$fecha_entrega);
        $statement->bindParam(':observaciones',$observaciones);
        $statement->bindParam(':usuario',$usuario);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function addPrecio($producto,$cantidad,$precio_venta){
        $statement=$this->conexion->prepare("INSERT INTO pedido_detalle (producto,cantidad,precio_venta)
                                            VALUES(:producto,:cantidad,:precio_venta)");
        $statement->bindParam(':producto',$producto);
        $statement->bindParam(':cantidad',$cantidad);
        $statement->bindParam(':precio_venta',$precio_venta);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function existe($id){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM pedido WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT b.nombre AS producto, a.cantidad, a.precio_venta, (a.cantidad* a.precio_venta) as totalpedido
                                             FROM pedido_detalle AS a 
                                             INNER JOIN producto AS b ON a.producto = b.id_producto");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getCliente(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM cliente");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getProducto(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM producto");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM pedido WHERE id=:id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function PrecioPorProducto($id){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM producto_precio WHERE id_producto = :id");
        $statement->bindParam(':id',$id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function BuscarNumPedido(){
        $rows=null;
        $codigo='PED';
        $statement=$this->conexion->prepare("SELECT valor FROM consecutivos WHERE codigo = :id");
        $statement->bindParam(':id', $codigo);
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