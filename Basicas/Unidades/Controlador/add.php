<?php
require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $nombre_unidad = $_POST['nombre_unidad'];
    $usuario = $_POST['user'];
    
    $modeloUnidades->add($nombre_unidad,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>