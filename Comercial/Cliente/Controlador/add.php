<?php
require_once('../Modelo/cliente.php');

if ($_POST) {
    $modeloCliente = new cliente();

    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];
    $usuario = $_POST['user'];
    if( $modeloCliente->existe($identificacion)){
        create_flash_message("Error", "El cliente ya existe","error");
        header('Location: ../Vista/index.php');
    }else {
        $modeloCliente->add($identificacion,$nombre,$marca,$telefono,$correo,$direccion,$departamento,$ciudad,$usuario);
    }
} else{
    header('Location: ../Vista/index.php');
}

?>