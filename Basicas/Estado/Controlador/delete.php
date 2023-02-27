<?php

require_once('../Modelo/estado.php');

if ($_POST) {
    $modeloestado = new estado();

    $id = $_POST['id'];
    
    $modeloestado->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>