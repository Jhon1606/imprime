<?php
require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedidos = new pedidos();

    $id_pedido = $_POST['id_pedido'];
    $numero_pedido = $_POST['numero_pedido'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    // $total = $_POST['total'];
    if(empty($numero_pedido)){ // empty para validar que el campo no esté vacio
        create_flash_message("Error", "Número de pedido no existe","error");
        header('Location: ../Vista/index.php');
    } else{
        $modeloPedidos->addDetalle($id_pedido,$numero_pedido,$producto,$cantidad,$precio);
        header('Location: ../Vista/index.php?numero_pedido='.$numero_pedido.'&fecha='.$fecha_pedido);
    }
} else{
    header('Location: ../Vista/index.php');
}

?>