<?php

require_once('../Modelo/persona.php');

if ($_POST) {
    $modeloPersona = new persona();

    $id = $_POST['id'];
    
    $modeloPersona->delete($id);
    }else{
        header('Location: ../Vista/index.php');
    }

?>