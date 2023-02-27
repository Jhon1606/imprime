<?php
require_once("../../../Basicas/usuarios/Modelo/usuarios.php");

$id = $_POST["id"];
$arreglo = array();

$modeloUsuario = new usuarios();
$informacionUsuario = $modeloUsuario->getById($id);

if ($informacionUsuario != null){

    foreach ($informacionUsuario as $infoUsuario) {
       
        $arreglo[] = array(
                            "user_nombre"=>$infoUsuario["user_nombre"],     
                            "perfil"=>$infoUsuario["perfil"]
                        );
    }
}

echo json_encode($arreglo);

?>