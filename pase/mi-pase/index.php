<?php
    session_start();
    if(isset($_SESSION['activeSession']))
    {
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mi pase</title>

        <link rel="stylesheet" href="../CSS/General.css">
    </head>

    <body>
        <h1>Hola mundo!</h1>
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