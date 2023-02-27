<?php
require_once('../Modelo/estado.php');

if ($_POST) {
    $modeloEstado = new estado();

    $descripcion = $_POST['descripcion'];
    $usuario = $_POST['user'];
    
    $modeloEstado->add($descripcion,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>