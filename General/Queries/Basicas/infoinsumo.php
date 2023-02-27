<?php
require_once("../../../Basicas/Insumo/Modelo/insumo.php");

$id = $_POST["id"];
$arreglo = array();

$modeloInsumo = new insumo();
$informacionInsumo = $modeloInsumo->getById($id);

if ($informacionInsumo != null){

    foreach ($informacionInsumo as $infoInsumo) {
       
        $arreglo[] = array(
                            "codigo"=>$infoInsumo["codigo"],     
                            "nombre"=>$infoInsumo["nombre"],     
                            "categoria"=>$infoInsumo["id_categoria"],     
                            "precio_costo"=>$infoInsumo["precio_costo"],       
                            "unidad"=>$infoInsumo["id_unidad"]        
                        );
    }
}

echo json_encode($arreglo);

?>