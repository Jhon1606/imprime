<?php
require_once('../Modelo/ciudad.php');

if ($_POST) {
    $modeloCiudad = new ciudad();

    $id_departamento = $_POST['id_departamento'];
    $nombre_ciudad = $_POST['nombre_ciudad'];
    
    $modeloCiudad->add($id_departamento,$nombre_ciudad);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>