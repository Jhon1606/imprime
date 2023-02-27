<?php

require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

    $id = $_POST['id'];
    
    $modeloProducto->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>