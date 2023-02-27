<?php

require_once('../Modelo/proceso.php');

if ($_POST) {
    $modeloProceso = new proceso();

    $id = $_POST['id'];
    
    $modeloProceso->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>