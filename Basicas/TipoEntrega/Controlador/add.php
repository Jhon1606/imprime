<?php
require_once('../Modelo/tipoentrega.php');

if ($_POST) {
    $modeloTipoEntrega = new tipoentrega();

    $descripcion = $_POST['descripcion'];
    $usuario = $_POST['user'];
    
    $modeloTipoEntrega->add($descripcion,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>