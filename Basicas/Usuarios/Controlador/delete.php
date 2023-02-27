<?php

require_once('../Modelo/usuarios.php');

if ($_POST) {
    $modeloUsuario = new usuarios();

    $id = $_POST['id'];
    
    $modeloUsuario->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>