<?php
    $code = $_GET["code"];
    $code = strtoupper($code);

    require "consulta.php";
    if(consultaCodigo($code))
    {
        header("Location:../pase/mi-pase/");
    }
?>