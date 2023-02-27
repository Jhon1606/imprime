<?php

require_once('../Modelo/ciudad.php');

if ($_POST) {
    $modeloCiudad = new ciudad();

    $id = $_POST['id'];
    
    $modeloCiudad->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>