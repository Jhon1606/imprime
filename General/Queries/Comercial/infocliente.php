<?php
require_once("../../../Comercial/Cliente/Modelo/cliente.php");

$id = $_POST["id"];
$arreglo = array();

$modeloCliente = new cliente();
$informacionCliente = $modeloCliente->getById($id);

if ($informacionCliente != null){

    foreach ($informacionCliente as $infoCliente) {
       
        $arreglo[] = array(
                            "identificacion"=>$infoCliente["identificacion"],     
                            "nombre"=>$infoCliente["nombre"],     
                            "marca"=>$infoCliente["marca"],     
                            "telefono"=>$infoCliente["telefono"],       
                            "correo"=>$infoCliente["correo"],     
                            "direccion"=>$infoCliente["direccion"],     
                            "departamento"=>$infoCliente["departamento"],     
                            "ciudad"=>$infoCliente["ciudad"]     
                        );
    }
}

echo json_encode($arreglo);

?>