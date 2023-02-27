<?php
require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

    $id_producto = $_POST['id_producto'];
    $referencia = $_POST['referencia'];
    $precio_venta = $_POST['precio_venta'];
    $usuario = $_POST['user'];

    $modeloProducto->addPrecio($id_producto,$referencia,$precio_venta,$usuario);
} else{
    header('Location: ../Vista/index.php');
}

?>