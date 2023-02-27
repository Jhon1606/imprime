<?php
require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedidos = new pedidos();

    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    // $total = $_POST['total'];
    
    $modeloPedidos->addPrecio($producto,$cantidad,$precio);

} else{
    header('Location: ../Vista/index.php');
}

?>