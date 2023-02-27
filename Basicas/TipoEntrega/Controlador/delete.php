<?php

require_once('../Modelo/tipoentrega.php');

if ($_POST) {
    $modeloTipoEntrega = new tipoentrega();

    $id = $_POST['id'];
    
    $modeloTipoEntrega->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>