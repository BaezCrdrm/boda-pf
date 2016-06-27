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

            if($_SESSION['activeSession'] == true) {
                session_unset();
            }
            switch ($tipo[0]) {
                case 1:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['id'] = $code;
                    $_SESSION['nombre'] = $c[0];
                    $_SESSION['apellido'] = $c[1];
                    $_SESSION['tipo'] = "ind";
                    break;

                case 2:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['id'] = $code;
                    $_SESSION['nombre'] = $c[0];
                    $_SESSION['cantidad'] = $c[2];
                    $_SESSION['ninios'] = $c[3];
                    $_SESSION['tipo'] = "fam";
                    break;

                case 3:
                    $_SESSION['activeSession'] = true;
                    $_SESSION['id'] = $code;
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

    // Administrador verifica asistencia
    function consultaAsistencia() {
        $query = "SELECT invitados.nombre, invitados.apellido, asistencia.estado FROM invitados INNER JOIN asistencia ON invitados.id=asistencia.id";
        $consulta = genQuery($query);

        $string = "<table>
        <tr>
            <th>Nombre / Grupo / Familia</th>
            <th>Apellido (individuo)</th>
            <th>Estado</th>
        </tr>";

        while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
            $string .= "<tr>
                <td>".$reg[0]."</td>
                <td>".$reg[1]."</td>";

            $estado = "";
            switch ($reg[2]) {
                case 0:
                    $estado = "Sin confirmaar";
                    break;
                
                case 1:
                    $estado = "Asistirá(n)";
                    break;
                
                case 2:
                    $estado = "No asistirá(n)";
                    break;
            }
            $string .= "<td>$estado</td>
            </tr>";
        }

        $string .= "</table>";
        return $string;
    }

    // Marca selección para el usuario
    function consultaAsistenciaPrevia($id) {
        $query = "SELECT estado FROM asistencia WHERE id='$id'";

        $reg = mysqli_fetch_array(genQuery($query), MYSQLI_NUM);
        return $reg[0];
    }
?>