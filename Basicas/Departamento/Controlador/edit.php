<?php

require_once('../Modelo/departamento.php');

if ($_POST) {
    $modeloDepartamento = new departamento();

    $id = $_POST['id_departamento'];
    $nombre_departamento = $_POST['nombre_departamento'];
    
    $modeloDepartamento->update($id,$nombre_departamento);
    }else{
        header('Location: ../Vista/index.php');
    }

?>