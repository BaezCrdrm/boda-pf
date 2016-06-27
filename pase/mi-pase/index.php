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
    </head>

    <body>
        <div id="pase">
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