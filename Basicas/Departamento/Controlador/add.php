<?php
require_once('../Modelo/departamento.php');

if ($_POST) {
    $modeloDepartamento = new departamento();

    $nombre_departamento = $_POST['nombre_departamento'];
    
    $modeloDepartamento->add($nombre_departamento);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>