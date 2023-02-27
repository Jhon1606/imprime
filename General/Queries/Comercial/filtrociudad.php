<?php
error_reporting(0);
require_once "../../../Comercial/Cliente/Modelo/cliente.php";

$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];

$ModeloCliente = new cliente();
$InformacionCiudades = $ModeloCliente->CiudadPorDepartamento($departamento);

$selectCiudad = "<label class='form-label'>Ciudad</label>";
$selectCiudad .= "<select class='form-select' name='ciudad' id='ciudad'>";

if($InformacionCiudades != null){

    if($ciudad != ""){

        foreach ($InformacionCiudades as $InfoCiudad) {

            if($InfoCiudad["id_ciudad"] == $ciudad){

                $selectCiudad .= "<option value='" . $InfoCiudad["id_ciudad"] . "'>" . $InfoCiudad["nombre_ciudad"] . "</option>";

            }    
        }
    } 
    
    $selectCiudad .= "<option value=''>Seleccione una opción</option>";

    foreach ($InformacionCiudades as $InfoCiudad) {
        
        $selectCiudad .= "<option value='" . $InfoCiudad["id_ciudad"] . "'>" . $InfoCiudad["nombre_ciudad"] . "</option>";

    }
}

$selectCiudad .= "</select>";

echo $selectCiudad;

?>