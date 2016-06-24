<?php
    function genQuery($query)
    {
        require "conexion.php";
        $consulta = mysqli_query($conecta, $query);
        return $consulta;
    }

    function consultaCodigo($code) {
        $query = "SELECT tipo FROM invitados WHERE id='$code'";
        $tipo = mysqli_fetch_array(genQuery($query), MYSQLI_NUM);

        if (count($tipo) > 0) {
            if ($tipo[0] == 1) {
                $query = "SELECT nombre, apellido FROM invitados WHERE id='$code'";
            }
            else if($tipo[0] == 2 || $tipo[0] == 3){
                $query = "SELECT invitados.nombre, invitados.tipo, invitados.canGrupo, infantes.cantidad FROM invitados INNER JOIN infantes ON invitados.id = '$code' AND infantes.id = '$code'";
            }

            $c = mysqli_fetch_array(genQuery($query), MYSQLI_NUM);
            session_start();
            switch ($tipo[0]) {
                case 1:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['nombre'] = $c[0];
                    $_SESSION['apellido'] = $c[1];
                    $_SESSION['tipo'] = "ind";
                    break;

                case 2:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['nombre'] = $c[0];
                    $_SESSION['cantidad'] = $c[2];
                    $_SESSION['ninios'] = $c[3];
                    $_SESSION['tipo'] = "fam";
                    break;

                case 3:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['nombre'] = $c[0];
                    $_SESSION['cantidad'] = $c[2];
                    $_SESSION['tipo'] = "gr";
                    break;
            }
            return true;
        }
        else {
            return false;
        }
    }
?>