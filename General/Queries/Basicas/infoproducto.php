<?php
require_once("../../../Basicas/Producto/Modelo/producto.php");

$id = $_POST["id"];
$arreglo = array();

$modeloProducto = new producto();
$informacionProducto = $modeloProducto->getById($id);

if ($informacionProducto != null){

    foreach ($informacionProducto as $infoProducto) {
       
        $arreglo[] = array(
                            "codigo"=>$infoProducto["codigo"],     
                            "nombre"=>$infoProducto["nombre"],     
                            "categoria"=>$infoProducto["id_categoria"],     
                            "precio_venta"=>$infoProducto["precio_venta"],       
                            "precio_costo"=>$infoProducto["precio_costo"],       
                            "unidad"=>$infoProducto["id_unidad"],    
                            "prod_compuesto"=>$infoProducto["es_producto_compuesto"]    
                        );
    }
}

echo json_encode($arreglo);

?>