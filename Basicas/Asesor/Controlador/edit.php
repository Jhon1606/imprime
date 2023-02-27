<?php

require_once('../Modelo/asesor.php');

if ($_POST) {
    $modeloAsesor = new asesor();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono'];
    
    $modeloAsesor->update($id,$nombre,$correo,$telefono);
    }else{
        header('Location: ../Vista/index.php');
    }

?>