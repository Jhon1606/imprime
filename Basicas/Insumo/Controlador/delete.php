<?php

require_once('../Modelo/insumo.php');

if ($_POST) {
    $modeloInsumo = new insumo();

    $id = $_POST['id'];
    
    $modeloInsumo->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>