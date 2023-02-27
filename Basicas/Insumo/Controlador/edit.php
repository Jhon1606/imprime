<?php

require_once('../Modelo/insumo.php');

if ($_POST) {
    $modeloInsumo = new insumo();

    $id = $_POST['id_insumo'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio_costo = $_POST['precio_costo'];
    $unidad = $_POST['unidad']; 
    
    $modeloInsumo->update($id,$codigo,$nombre,$categoria,$precio_costo,$unidad);
    }else{
        header('Location: ../Vista/index.php');
    }

?>