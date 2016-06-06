<?php
    function genQuery($query)
    {
        require "conexion.php";
        $consulta = mysqli_query($conecta, $query);
        return $consulta;
    }
?>