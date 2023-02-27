<?php
require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedidos = new pedidos();

    $numero_pedido = $_POST['numero_pedido'];
    $fecha = $_POST['fecha'];
    $cliente = $_POST['cliente'];
    $fecha_aprobado = $_POST['fecha_aprobado'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $observaciones = $_POST['observaciones'];
    $usuario = $_POST['user'];
    
    $modeloPedidos->add($numero_pedido,$fecha,$cliente,$fecha_aprobado,$fecha_entrega,$observaciones,$usuario);

} else{
    header('Location: ../Vista/index.php');
}

?>