<?php

require_once('../Modelo/pedidos.php');

if ($_POST) {
    $modeloPedido = new pedidos();

    $id = $_POST['id'];
    
    $modeloPedido->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>