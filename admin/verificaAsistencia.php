<html>
    <head>
        <meta charset="utf-8">
        <title>Asistencias</title>

        <style>
            table {

            }

            table td, th {
                border:1px solid black;
                text-align:center;
            }
        </style>
    </head>

    <body>
        <?php
            require "../scripts/consulta.php";
            echo consultaAsistencia();
        ?>
    </body>
</html>