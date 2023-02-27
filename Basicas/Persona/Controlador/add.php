<?php
require_once('../Modelo/persona.php');

if ($_POST) {
    $modeloPersona = new persona();

    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $proceso = $_POST['proceso'];
    $usuario = $_POST['user'];
    if( $modeloPersona->existe($identificacion)){
        create_flash_message("Error", "El cliente ya existe","error");
        header('Location: ../Vista/index.php');
    }else {
        $modeloPersona->add($identificacion,$nombre,$telefono,$correo,$proceso,$usuario);
    }
} else{
    header('Location: ../Vista/index.php');
}

?>