<?php
    require "../scripts/galeria.php";
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Historia de Febe y Cristhian">
        <meta name="keywords" content="Febe,Cristhian,Boda,Cruz Melgar,Hernández Báez, Nuestra historia">

        <title>Nuestra historia</title>
        <link rel="stylesheet" href="../CSS/General.css" media="all">
        <link rel="stylesheet" href="../CSS/Galeria.css" media="all">
        <link rel="stylesheet" href="../CSS/GaleriaDesktop.css" media="only screen and (min-device-width:799px)">
        <link rel="stylesheet" href="../CSS/GaleriaMovil.css" media="handheld, screen and (max-device-width:799px)" />
        <link rel="stylesheet" href="../CSS/Menu.css" media="all">
    </head>

    <body onscroll="cierra(document.getElementById('ul_menu'), false)">
        <header>
            <div class="pyf">
                <a href="../" title="Ir a inicio - Boda Febe & Cristhian"><h1>F&C</h1></a>
            </div>

            <nav id="menu">
                <img id="imgMenu" src="../img/blanco.png" title="Mostrar menú" ontouchend="mostrarMenu()">
                <ul id="ul_menu">
                    <li><a href="../historia/" class="a_menu">Historia</a></li>
                    <li><a href="#" class="a_menu">Galería</a></li>
                    <li><a href="../ubicacion/" class="a_menu">Ubicación</a></li>
                    <li><a href="../pase/" class="a_menu">Pase</a></li>
                </ul>
            </nav>
        </header>

        <section id="principal">
            <div id="seccion-galeria">
                <nav id="menu-albumes">
                    <ul id="ul-albumes">
                        <?php
                            echo getAlbums();
                        ?>
                    </ul>
                </nav>

                <section id="album">
                    <div id="cont-img">
                        <a href="../img/historia.jpg" target="_blank"><img id="mainImg" src="../img/historia.jpg"/></a>
                        
                        <nav id="controles">
                            <img src="../img/LAr.png" />
                            <img src="../img/RAr.png" />
                        </nav>
                    </div>

                    <nav id="imgAlbum">
                        <!--Aquí van imágenes cargadas de la carpeta de origen-->
                    </nav>
                </section>
            </div>
        </section>
    </body>
    <script src="../scripts/funciones.js"></script>
</html>