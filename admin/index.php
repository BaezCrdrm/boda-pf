<?php
    ini_set('display_errors', 'Off');
    $user = $_POST['user'];
    $pass = $_POST['password'];
    
    if($pass=="holaMundo123")
    {
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Admin</title>  
        
        <script type="text/javascript">            
            function fecha()
            {
                var d = new Date();                    
                document.getElementById("hiDia").value = d.getDate();
                document.getElementById("hiMes").value = d.getDate();
            }
        </script>
    </head>
    
    <body onload="fecha()">
        <form id="alta" action="../scripts/alta.php">
            <label for="">Individuo</label> <input type="radio" name="sel1" checked="checked" value="individuo" onchange="cambioPersona('textP1', 'textP2')"/><br>
            <input type="text" name="nombre" class="textP1" placeholder="Nombre de persona" /><br>
            <input type="text" name="apellido" class="textP1" placeholder="Apellido de persona" /><br><br>
            
            <label for="">Familia</label> <input type="radio" name="sel1" value="grupo" onchange="cambioPersona('textP2', 'textP1')"/><br>
            <input type="text" name="grupo" class="textP2" placeholder="Familia/Grupo" disabled="disabled"/><br>
            <input type="number" name="cantGrupo" min="2" class="textP2" placeholder="Integrantes" disabled="disabled"/><br>
            <input type="number" name="cantFamNinos" min="0" class="textP2" placeholder="Niños" disabled="disabled" value = "0"/><br><br>
            
            <input type="hidden" name="mes" id="hiMes"/>
            <input type="hidden" name="dia" id="hiDia"/>            
            
            <input type="submit" value="Agregar"/>
        </form>        
        <script src="../scripts/funciones.js"></script>
    </body>
</html>
<?php
    }
    else {
        echo "<form action='' method='post'>
          <input type='password' placeholder='Contraseña de administrador' name='password'/>
          <input type='hidden' name='user' value='admin'/><input type='submit' value='Entrar'/>
        </form>
        
        <h1 onclick='alert(window.innerWidth)'>Tamaño ventana</h1>";
    }
?>