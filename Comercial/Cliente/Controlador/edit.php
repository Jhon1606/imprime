<?php

require_once('../Modelo/cliente.php');

if ($_POST) {
    $modeloCliente = new cliente();

    $id = $_POST['id_cliente'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo']; 
    $direccion = $_POST['direccion'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];
    
    $modeloCliente->update($id,$identificacion,$nombre,$marca,$telefono,$correo,$direccion,$departamento,$ciudad);
    }else{
        header('Location: ../Vista/index.php');
    }

?>