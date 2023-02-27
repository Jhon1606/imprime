<?php

require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $id = $_POST['id_unidad'];
    $nombre_unidad = $_POST['nombre_unidad'];
    
    $modeloUnidades->update($id,$nombre_unidad);
    }else{
        header('Location: ../Vista/index.php');
    }

?>