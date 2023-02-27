<?php

require_once('../Modelo/categoria.php');

if ($_POST) {
    $modeloCategoria = new categoria();

    $id = $_POST['id'];
    
    $modeloCategoria->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>