<?php
    $tipo = $_GET['sel1'];
   
    /*Generar id 
    Verificar id 
    [opcional] modificar id*/
        
    $query = "INSERT INTO invitados (id, nombre, ";
    if($tipo=="individuo")
    {
        $query += "apellido, tipo) VALUES ()";
    }
    else {
        
    }
?>