<?php

require_once('../Modelo/producto.php');

if ($_POST) {
    $modeloProducto = new producto();

    $id = $_POST['id'];
    
    $modeloProducto->deletePrecio($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>