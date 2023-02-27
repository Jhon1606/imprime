<?php
require_once('../Modelo/insumo.php');

if ($_POST) {
    $modeloInsumo = new insumo();

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio_costo = $_POST['precio_costo'];
    $unidad = $_POST['unidad'];
    $usuario = $_POST['user'];
    if( $modeloInsumo->existe($codigo)){
        create_flash_message("Error", "El insumo ya existe","error");
        header('Location: ../Vista/index.php');
    }else {
        $modeloInsumo->add($codigo,$nombre,$categoria,$precio_costo,$unidad,$usuario);
    }
} else{
    header('Location: ../Vista/index.php');
}

?>