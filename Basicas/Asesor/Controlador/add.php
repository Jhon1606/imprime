<?php
require_once('../Modelo/asesor.php');

if ($_POST) {
    $modeloAsesor = new asesor();

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono']; 
    $usuario = $_POST['usuario']; 
    
    $modeloAsesor->add($nombre,$correo,$telefono,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>