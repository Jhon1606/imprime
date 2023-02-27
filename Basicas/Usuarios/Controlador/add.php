<?php
require_once("../Modelo/usuarios.php");

if ($_POST) {
    $user_id = $_POST['user_id'];
    $user_nombre = $_POST['user_nombre'];
    $perfil = $_POST['perfil'];
    $clave = $_POST['clave'];

    $modeloUsuario = new usuarios();
    $modeloUsuario->add($user_id,$user_nombre,$perfil,$clave);
        
   }else{
        header('Location: ../Vista/index.php');
   }

?>