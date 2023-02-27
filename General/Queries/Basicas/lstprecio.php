<?php

require_once("../../../Basicas/Producto/Modelo/producto.php");

$id_producto = $_POST["id_producto"];
$arreglo = array();

$modeloProducto = new producto();

$precios = $modeloProducto->getPrecio($id_producto);
if($precios != null){ 
    foreach($precios as $precio){
       
        $arreglo[] = array(
            "id_precio"=>$precio["id_precio"],
            "id_producto"=>$precio["id_producto"],
            "referencia"=>$precio["referencia"],
            "precio"=>$precio["precio_venta"],
            "usuario"=>$precio["usuario"]
        );
    }
}

echo json_encode($arreglo);

?>