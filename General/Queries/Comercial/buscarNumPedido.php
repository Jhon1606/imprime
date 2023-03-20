<?php
error_reporting(0);
require_once "../../../Comercial/Pedidos/Modelo/pedidos.php";

$ModeloPedido = new pedidos();
$Pedidos = $ModeloPedido->Pedidos();

$Pedidos = $Pedidos + 1;

echo 'PED'.str_pad($Pedidos, 4, "0", STR_PAD_LEFT);

?>