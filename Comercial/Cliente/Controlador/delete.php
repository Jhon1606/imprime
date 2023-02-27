<?php

require_once('../Modelo/cliente.php');

if ($_POST) {
    $modeloCliente = new cliente();

    $id = $_POST['id'];
    
    $modeloCliente->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>