<?php
require_once("../../../Basicas/Categoria/Modelo/categoria.php");

$id = $_POST["id"];
$arreglo = array();

$modeloCategoria = new categoria();
$informacionCategoria = $modeloCategoria->getById($id);

if ($informacionCategoria != null){

    foreach ($informacionCategoria as $infoCategoria) {
       
        $arreglo[] = array(
                            "nombre"=>$infoCategoria["nombre_categoria"]       
                        );
    }
}

echo json_encode($arreglo);

?>