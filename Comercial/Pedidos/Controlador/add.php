<?php
require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedidos = new pedidos();

    $numero_pedido = $_POST['numero_pedido'];
    $cliente = $_POST['cliente'];
    $fecha = $_POST['fecha'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $observaciones = $_POST['observaciones'];
    $usuario = $_POST['user'];
    
    $modeloPedidos->add($numero_pedido,$cliente,$fecha,$fecha_entrega,$observaciones,$usuario);
    header('Location: ../Vista/index.php?numero_pedido='.$numero_pedido.'&fecha='.$fecha);

} else{
    header('Location: ../Vista/index.php');
}

?>