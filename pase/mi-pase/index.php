<?php
    session_start();
    if(isset($_SESSION['activeSession']))
    {
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mi pase</title>

        <link rel="stylesheet" href="../../CSS/General.css" media="all">
        <link rel="stylesheet" href="../../CSS/PasePrint.css" media="print">
        <link rel="stylesheet" href="../../CSS/Pase.css" media="all">
        <link rel="stylesheet" href="../../CSS/PaseScreen.css" media="screen">
    </head>

    <body>
        <div id="pase">
            <img src=<?php
                switch ($_SESSION['tipo']) {
                    case "ind":
                        echo "'../../img/pase/Pase-personal.jpg'";
                        break;

                    case "fam":
                        echo "'../../img/pase/Pase-adultos_infante.jpg'";
                        break;

                    case "gr":
                        echo "'../../img/pase/Pase-adultos.jpg'";
                        break;
                }
            ?>>

            <div id="contenedor-nombre">
                <p id="nombre"><?php
                    switch ($_SESSION['tipo']) {
                        case "ind":
                            $name = $_SESSION['nombre']." ".$_SESSION['apellido'];
                            if(count($name) < 28) {
                                echo $name;
                            } else {
                                echo $_SESSION['nombre']."<br>".$_SESSION['apellido'];
                            }
                            break;

                        case "fam":
                            echo "Fam. ".$_SESSION['nombre'];
                            break;

                        case "gr":
                            echo $_SESSION['nombre'];
                            break;
                    }
                ?></p>
            </div>

            <div class="contenedores" id="contenedor-adultos">
                <p id="adultos"> <?php
                    if(!isset($_SESSION['ninios'])) {
                        echo "<style>
                            #contenedor-adultos {
                                top: 730px !important;
                            }
                        </style>";
                    }

                    if(isset($_SESSION['cantidad'])) {
                        echo $_SESSION['cantidad'];
                    }
                ?>
                </p>
            </div>

            <div class="contenedores" id="contenedor-infantes">
                <p id="inf"> <?php
                    if(isset($_SESSION['ninios'])) {
                        echo $_SESSION['ninios'];
                    }
                ?>
                </p>
            </div>
        </div>

        <div id="div-formC" title="El código ha sido proporcionado de manera única.">
            <?php
                require "../../scripts/consulta.php";
                $sel = consultaAsistenciaPrevia($_SESSION['id']);
            ?>

            <form method="POST" action="../../scripts/asistencia.php">
                <h1 id="titulo"><label for="codigo">Confirma tu asistencia</label></h1>
                <select id="asistencia" name="confirma" onchange="submit();">
                    <option value="" disabled <?php if($sel=="0"){echo "selected";}?>>Elige tu opción</option>
                    <option value="yes" <?php if($sel=="1"){echo "selected";}?>>Asistiré</option>
                    <option value="no" <?php if($sel=="2"){echo "selected";}?>>No asistiré</option>
                </select>
                <input type="hidden" name="id" value=<?php echo ("'".$_SESSION['id']."'"); ?> />
                <!--<input type="submit" id="submit" value="Confirmar">-->
            </form>
        </div>
    </body>
</html>

<?php
    } 
    else {
        echo "<script type='text/javascript'>
            alert('Introduzca un código válido');
            window.location.href = '../';
        </script>";
    }
?>