<?php
    $valor = $_POST['confirma'];
    $id = $_POST['id'];

    if($valor != "") {
        $query = "UPDATE asistencia SET estado='";
        if($valor == "yes") {
            $query .= "1' ";
        } elseif ($valor == "no") {
            $query .= "2' ";
        }
        $query .= "WHERE id='$id'";
        
        require "consulta.php";
        if(genQuery($query))
        {
            header("Location:../pase/mi-pase/");
        }
        else {
            echo "<script>alert('Ha ocurrido un problema. Intente mas tarde.');</script>";
        }
    }
?>