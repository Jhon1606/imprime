<?php
require_once('../Modelo/proceso.php');

if ($_POST) {
    $modeloProceso = new proceso();

    $nombre_proceso = $_POST['nombre_proceso'];
    $usuario = $_POST['user'];
    
    $modeloProceso->add($nombre_proceso,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>