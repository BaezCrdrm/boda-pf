function cambioPersona(elEn, elDis)
{
    for (var j = 0; j < 2; j++) {
        var elementos;
        if(j==0)
            elementos = document.getElementsByClassName(elEn);
        else
            elementos = document.getElementsByClassName(elDis);
        
        for (var index = 0; index < elementos.length; index++) {
            elementos[index].value = "";
            elementos[index].disabled = !elementos[index].disabled;
        }
    }
}

function sizeChanged()
{
     var size = window.innerWidth;
     var a_menu = document.getElementsByClassName("a_menu");
     var imgMenu = document.getElementById("imgMenu");

     if(size < 800)
     {       
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "none";
        }  
        imgMenu.style.display = "inline";
        document.getElementById("menu").style.marginTop = "40px";
     }
     else {
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "inline";
        }
        imgMenu.style.display = "none";
        document.getElementById("menu").style.marginTop = "72px";
     }
     
     a_menu = null;
}

function mostrarMenu()
{
    var a_menu = document.getElementsByClassName("a_menu");
    
    if(a_menu[0].style.display == "none")
    {
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "list-item";
        }  
    }
    else {
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "none";
        }  
    }
}