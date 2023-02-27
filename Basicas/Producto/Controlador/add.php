<?php
require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

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
    $usuario = $_POST['user'];

    if( $modeloProducto->existe($codigo)){
        create_flash_message("Error", "El producto ya existe","error");
        header('Location: ../Vista/index.php');
    }else {
        $modeloProducto->add($codigo,$nombre,$categoria,$precio_venta,$precio_costo,$unidad,$prod_compuesto,$usuario);
    }
} else{
    header('Location: ../Vista/index.php');
}

?>