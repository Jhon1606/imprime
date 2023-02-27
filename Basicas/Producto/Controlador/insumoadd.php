<?php
require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

    $id_producto = $_POST['producto'];
    $producto = $_POST['nombre'];
    $id_insumo = $_POST['id_insumo'];
    $id_unidad = $_POST['id_unidad'];
    $cantidad = $_POST['cantidad'];
    $usuario = $_POST['user'];

    $modeloProducto->addInsumo($id_insumo,$id_producto,$id_unidad,$cantidad,$usuario);
    header('Location: ../Vista/insumo.php?id_producto='.$id_producto.'&producto='.$producto);
} else{
    header('Location: ../Vista/insumo.php');
}

?>