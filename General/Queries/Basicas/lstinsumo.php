<?php

require_once("../../../Basicas/Producto/Modelo/producto.php");

$id_producto = $_POST["id_producto"];
$arreglo = array();

$modeloProducto = new producto();

$insumos = $modeloProducto->getInsumos($id_producto);
if($insumos != null){ 
    foreach($insumos as $insumo){
       
        $arreglo[] = array(
            "id_compuesto"=>$insumo["id_compuesto"],
            "id_insumo"=>$insumo["insumo"],
            "id_producto"=>$insumo["id_producto"],
            "id_unidad"=>$insumo["unidad"],
            "cantidad"=>$insumo["cantidad"]
        );
    }
}

echo json_encode($arreglo);

?>