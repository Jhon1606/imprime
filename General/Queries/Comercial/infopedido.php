<?php
require_once("../../../Comercial/Pedidos/Modelo/pedidos.php");

$num_pedido = $_POST["num_pedido"];
$arreglo = array();

$modeloPedidos = new pedidos();
$informacionPedido = $modeloPedidos->filtroPedido($num_pedido);

if ($informacionPedido != null){

    foreach ($informacionPedido as $infoPedido) {
       
        $arreglo[] = array(
                            "cliente"=>$infoPedido["cliente"],     
                            "fecha"=>$infoPedido["fecha"],     
                            "fecha_entrega"=>$infoPedido["fecha_entrega"],     
                            "observaciones"=>$infoPedido["observaciones"],
                        );
    }
}

echo json_encode($arreglo);

?>