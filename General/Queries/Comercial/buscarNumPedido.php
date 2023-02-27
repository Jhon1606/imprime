<?php
error_reporting(0);
require_once "../../../Comercial/Pedidos/Modelo/pedidos.php";

$ModeloPedido = new pedidos();
$InformacionNumPedido = $ModeloPedido->BuscarNumPedido();

$inputNumPedido=0;

if ($InformacionNumPedido != null) {
    foreach ($InformacionNumPedido as $InfoNumPedido) {
        $inputNumPedido = $InfoNumPedido["valor"] ;
    }
} 

echo 'PED'.str_pad($inputNumPedido, 4, "0", STR_PAD_LEFT);

?>