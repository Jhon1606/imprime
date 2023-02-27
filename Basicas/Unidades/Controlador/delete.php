<?php

require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $id = $_POST['id'];
    
    $modeloUnidades->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>