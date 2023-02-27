<?php

require_once('../Modelo/departamento.php');

if ($_POST) {
    $modeloDepartamento = new departamento();

    $id = $_POST['id'];
    
    $modeloDepartamento->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>