<?php

require_once('../Modelo/asesor.php');

if ($_POST) {
    $modeloAsesor = new asesor();

    $id = $_POST['id'];
    
    $modeloAsesor->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>