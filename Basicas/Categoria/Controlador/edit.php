<?php

require_once('../Modelo/categoria.php');

if ($_POST) {
    $modeloCategoia = new categoria();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    
    $modeloCategoia->update($id,$nombre);
    }else{
        header('Location: ../Vista/index.php');
    }

?>