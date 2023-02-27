<?php
require_once("../../../Basicas/Persona/Modelo/persona.php");

$id = $_POST["id"];
$arreglo = array();

$modeloPersona = new persona();
$informacionPersona = $modeloPersona->getById($id);

if ($informacionPersona != null){

    foreach ($informacionPersona as $infoPersona) {
       
        $arreglo[] = array(
                            "identificacion"=>$infoPersona["identificacion"],     
                            "nombre"=>$infoPersona["nombre"],      
                            "telefono"=>$infoPersona["telefono"],       
                            "correo"=>$infoPersona["correo"],        
                            "proceso"=>$infoPersona["id_proceso"]
                        );
    }
}

echo json_encode($arreglo);

?>