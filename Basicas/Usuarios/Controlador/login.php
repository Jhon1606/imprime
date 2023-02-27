<?php
require_once("../Modelo/usuarios.php");

if ($_POST) {
     $usuario = $_POST['usuario'];
     $password = $_POST['password'];

     $modelo = new usuarios();
     if ($modelo->login($usuario, $password)) {
          header('Location: ../../Asesor/Vista/index.php');
     } else {
          header('Location: ../../../index.php');
     }
}
