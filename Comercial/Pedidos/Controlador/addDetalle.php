<?php
require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedidos = new pedidos();

    $id_pedido = $_POST['id_pedido'];
    $numero_pedido = $_POST['numero_pedido'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    // $total = $_POST['total'];
    
    $modeloPedidos->addDetalle($id_pedido,$numero_pedido,$producto,$cantidad,$precio);

} else{
    header('Location: ../Vista/index.php');
}

?>