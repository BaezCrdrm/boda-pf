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
                <form method="POST" action="../../scripts/consultaCodigo.php">
                    <h1 id="titulo"><label for="codigo">Confirma tu asistencia</label></h1>
                    <select id="asistencia" placeholder="Confirma tu asistencia">
                        <option value="" disabled selected>Elige tu opción</option>
                        <option value="yes">Asistiré</option>
                        <option value="no">No asistiré</option>
                    </select>
                    <input type="submit" id="submit" value="Consultar">
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