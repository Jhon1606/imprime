<?php
require_once('../Modelo/categoria.php');

if ($_POST) {
    $modeloCategoria = new categoria();

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario']; 
    
    $modeloCategoria->add($nombre,$usuario);
   
    }else{
        header('Location: ../Vista/index.php');
    }

?>