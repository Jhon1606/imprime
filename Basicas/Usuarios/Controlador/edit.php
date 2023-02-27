<?php

require_once('../Modelo/usuarios.php');

if ($_POST) {
    $modeloUsuario = new usuarios();

    $user_id = $_POST['user_id'];
    $user_nombre = $_POST['user_nombre'];
    $perfil = $_POST['perfil'];
    
    $modeloUsuario->update($user_id,$user_nombre,$perfil);
    }else{
        header('Location: ../Vista/index.php');
    }

?>