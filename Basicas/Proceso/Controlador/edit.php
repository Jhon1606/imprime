<?php

require_once('../Modelo/proceso.php');

if ($_POST) {
    $modeloProceso = new proceso();

    $id = $_POST['id_proceso'];
    $nombre_proceso = $_POST['nombre_proceso'];
    
    $modeloProceso->update($id,$nombre_proceso);
    }else{
        header('Location: ../Vista/index.php');
    }

?>