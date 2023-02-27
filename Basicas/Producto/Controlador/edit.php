<?php
require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

    $id = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio_venta = $_POST['precio_venta'];
    $precio_costo = $_POST['precio_costo'];
    $unidad = $_POST['unidad'];
    $prod_compuesto =$_POST['prod_compuesto'];
    if($prod_compuesto == ""){
        $prod_compuesto = 0;
    }

    $modeloProducto->update($id,$codigo,$nombre,$categoria,$precio_venta,$precio_costo,$unidad,$prod_compuesto);
    
} else{
    header('Location: ../Vista/index.php');
}

?>