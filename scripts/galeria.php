<?php
    $path = "Imagenes/";

    function getPath()
    {
        global $path;
        return $path;
    }

    function getFiles($files) {
        return scandir($files);
    }

    function getAlbums(){
        global $path;
        $array = getFiles($path);
        $albumes = array();

        for ($i=2, $j=0; $i < count($array); $i++, $j++) { 
            if(is_dir($path."/".$array[$i])) {
                $albumes[$j]= $array[$i];
            }
        }
        return $albumes;
    }

    function printAlbums($array) {
        $string = "";
        for ($i=0; $i < count($array); $i++) {
            $string .= "<li onclick=\"seleccionAlbum('formAlbum', this.innerHTML, 'sel')\">".$array[$i]."</li>";
        }
        return $string;
    }

    function getImages($album){
        global $path;
        $tempArray = getFiles($path."/".$album);
        $img = array();

        for ($i=2, $j=0; $i < count($tempArray); $i++, $j++) { 
            // if(is_file($path.$tempArray[$i])) {
                $img[$j]= $tempArray[$i];
            // }
        }

        return $img;
    }
?>