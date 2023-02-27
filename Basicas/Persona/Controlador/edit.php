<?php

require_once('../Modelo/persona.php');

if ($_POST) {
    $modeloPersona = new persona();

    $id = $_POST['id_persona'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo']; 
    $proceso = $_POST['proceso'];
    
    $modeloPersona->update($id,$identificacion,$nombre,$telefono,$correo,$proceso);
    }else{
        header('Location: ../Vista/index.php');
    }

?>