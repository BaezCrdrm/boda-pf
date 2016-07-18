<?php
    ini_set('display_errors', 'Off');
    require "../scripts/galeria.php";
    $carpetas = getAlbums();

    $album = $_GET['selectedAlbum'];
    // $album = $_POST['selectedAlbum'];
    if(isset($album))
    {
        $imagenes = getImages($album);
    }
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

    <body onscroll="cierra(document.getElementById('ul_menu'), false)" onload="getDevice()">
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
                <h2 id="show-albums-menu" ontouchend="showAlbums()">Albumes <span id="icon-albums">&#xE019</span></h2>
                <nav id="menu-albumes">
                    <form id="formAlbum" action="" method="get">
                        <input id="sel" name="selectedAlbum" type="hidden">
                        <ul id="ul-albumes">
                            <?php
                                echo printAlbums($carpetas);
                            ?>
                        </ul>
                    </form>
                </nav>

                <section id="album">
                    <div id="cont-img">
                        <a id="a-cont-img" target="_blank"><img id="mainImg" src="../img/historia.jpg"/></a>
                        
                        <nav id="controles1">
                            <img onclick="arrowImg('back')" ontouchend="arrowImg('back')" src="../img/LAr.png" />
                            <img onclick="arrowImg('forward')" ontouchend="arrowImg('forward')" src="../img/RAr.png" />
                        </nav>

                        <nav id="controles2">
                            <label onclick="arrowImg('back')" ontouchend="arrowImg('back')">Anterior</label>
                            <label onclick="arrowImg('forward')" ontouchend="arrowImg('forward')">Siguiente</label>
                        </nav>
                    </div>

                    <nav id="imgAlbum">
                        <!--Aquí van imágenes cargadas de la carpeta de origen-->
                        <ul id="ul-images-preview">
                            <?php
                                // echo getImages();
                            ?>
                        </ul>
                    </nav>
                </section>
            </div>
        </section>
    </body>
    <script src="../scripts/funciones.js"></script>
    <script src="../scripts/galeria.js"></script>
    <?php
        if(isset($album))
        {
    ?>
        <script type="text/javascript">
            var imagenes = <?php echo json_encode($imagenes);?>;
            if(imagenes.length > 0) 
            {
                cargaImagenes(imagenes, <?php echo "'".getPath()."', '".$album."'";?>);
            }
        </script>
    <?php
        }
    ?>
</html>