<?php

require_once('../Modelo/estado.php');

if ($_POST) {
    $modeloEstado = new estado();

    $id = $_POST['id_estado'];
    $descripcion = $_POST['descripcion'];
    
    $modeloEstado->update($id,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>