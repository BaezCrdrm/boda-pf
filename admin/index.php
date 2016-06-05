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
    </head>
    
    <body>
        <form id="alta" action="../scripts/alta">
            <label for="">Individuo</label> <input type="radio" name="sel1" checked="checked" value="individuo" onchange="cambioPersona('textP1', 'textP2')"/><br>
            <input type="text" name="nombre" class="textP1" placeholder="Nombre de persona" /><br>
            <input type="text" name="apellido" class="textP1" placeholder="Apellido de persona" /><br><br>
            
            <label for="">Familia</label> <input type="radio" name="sel1" value="grupo" onchange="cambioPersona('textP2', 'textP1')"/><br>
            <input type="text" name="grupo" class="textP2" placeholder="Familia/Grupo" disabled="disabled"/><br>
            <input type="number" name="cantGrupo" class="textP2" placeholder="Integrantes" disabled="disabled"/><br>
            <input type="number" name="cantFamNinos" class="textP2" placeholder="Niños" disabled="disabled"/><br><br>
            
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
        </form>";
    }
?>