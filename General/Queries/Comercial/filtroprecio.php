<?php
error_reporting(0);
require_once "../../../Comercial/Pedidos/Modelo/pedidos.php";

$producto = $_POST['producto'];

$ModeloPedido = new pedidos();
$InformacionPrecios = $ModeloPedido->PrecioPorProducto($producto);

$selectPrecio = "<label class='form-label'>Precio:</label>";
$selectPrecio .= "<select class='form-select' onchange='CalcularTotal()' name='precio' id='precio'> required=''";

if($InformacionPrecios != null){
    
    $selectPrecio .= "<option value=''>Seleccione una opción</option>";

    foreach ($InformacionPrecios as $InfoPrecio) {
        
        $selectPrecio .= "<option value='" . $InfoPrecio["precio_venta"] . "'>" . $InfoPrecio["precio_venta"] . "</option>";

    }
}

$selectPrecio .= "</select>";

echo $selectPrecio;

?>