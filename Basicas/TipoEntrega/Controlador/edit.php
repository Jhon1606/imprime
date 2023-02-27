<?php

require_once('../Modelo/tipoentrega.php');

if ($_POST) {
    $modeloTipoEntrega = new tipoentrega();

    $id = $_POST['id_tipo_entrega'];
    $descripcion = $_POST['descripcion'];
    
    $modeloTipoEntrega->update($id,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>