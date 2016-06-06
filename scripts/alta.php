<?php
    $tipo = $_GET['sel1'];
    $mes = $_GET['mes'];
    $dia = $_GET['dia'];
    
    if(count($dia) < 2)
        $dia = "0".$dia;
    
    $nombre = "";
    $apellido = "";
    $grupo = "";
    $cantGrupo = "";
    $canNinos;
    
    // Id = [2][1][3] Individuo ==> ID = [3][3] Grupo
    $id = "";
    
    if($tipo=="individuo")
    {
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        
        $nombre = strtoupper(normaliza($nombre));
        $myBool = false;
        if($apellido == "")
        {
            $myBool = true;
            $apellido = rand(0,9);
        }
        $apellido = strtoupper(normaliza($apellido));
        
        
        $array = preg_split('//', $nombre);
        for ($i=0; $i < 2; $i++) { 
            $id .= $array[$i+1];
        }
        
        $array = null;
        $array = preg_split('//', $apellido);
        $id .= $array[1];
        
        if($myBool == true)
        {
            $apellido = "";
        }
    }
    else {
        $grupo = $_GET['grupo'];
        $cantGrupo = $_GET['cantGrupo'];
        $canNinos = $_GET['cantFamNinos'];
        
        $grupo = strtoupper(normaliza($grupo));
        
        $array = preg_split('/ /', $grupo);
        $m1 = preg_split('//',$array[0]);
        $m2 = preg_split('//',$array[1]);
        
        
        for ($i=0; $i < 2; $i++) { 
            $id .= $m1[$i+1];
        }
        
        $id .= $m2[1];
    }
    
    $id .= $mes.$dia;
    $id = strtoupper($id);
    
    require "consulta.php";
    $query = "INSERT INTO invitados (id, nombre, ";
    if($tipo=="individuo")
    {
        $query .= "apellido, tipo) VALUES ('$id', '$nombre', '$apellido', 1);";
        alta($query);
    }
    else {
        $query .= "tipo) VALUES ('$id', '$grupo', 2);";
        alta($query);
        if($canNinos != "" && $canNinos > 0)
        {
            $query = "INSERT INTO infantes (id, cantidad) VALUE ('$id', $canNinos)";
            alta($query);
        }
    }
    
    
    
    function normaliza ($cadena){
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        $cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }
    
    function alta($query)
    {   
        echo "<script type='text/javascript'>";
        if(genQuery($query))
        {
            echo "alert('Se ha registrado correctamente');";
        }
        else {
            echo "alert('Ha ocurrido un problema');";
        }    
        echo "</script>";
    }
?>