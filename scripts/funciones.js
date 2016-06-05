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