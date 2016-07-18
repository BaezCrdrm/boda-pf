var i = 0;
var imagenes;
var rutas;
var menuAlbum = false;

function seleccionAlbum(form, album, oculto)
{
    document.getElementById(oculto).value = album;
    document.getElementById(form).submit();
}

function cargaImagenes(array, path, album) 
{
    var padre = document.getElementById("ul-images-preview");
    array.forEach(function(img) {
        var li = document.createElement("li");
        var imgTag = document.createElement("img");
        imgTag.src=path+album+"/"+img;
        imgTag.className = "imgPreview";
        imgTag.addEventListener("click", function(){imgSelection(this)});
        li.appendChild(imgTag);
        padre.appendChild(li);
    });
    imagenes=array;
    rutas = path+album;

    document.getElementById("mainImg").src = rutas + "/" + imagenes[0];
    changeHref(rutas + "/" + imagenes[0]);
}

function imgSelection(img) 
{
    document.getElementById("mainImg").src = img.src;
    changeHref(img.src);
    var imgNameArray = img.src.split("/");
    var imgName = imgNameArray[imgNameArray.length - 1]

    for (var index = 0; index < imagenes.length; index++) {
        if(imagenes[index]==imgName){
            i=index;
            break;
        }
    }
}

function arrowImg(direccion) 
{
    switch (direccion) {
        case "back":
            i--;
            if (i < 0) {
                i = imagenes.length - 1;
            }
            break;

        case "forward":
            i++;
            if(i >= imagenes.length) {
                i = 0;
            }
            break;
    }
    document.getElementById("mainImg").src = rutas + "/" + imagenes[i];
    changeHref(rutas + "/" + imagenes[i]);
}

function changeHref(href) {
    document.getElementById("a-cont-img").href = href;
}

function showAlbums() {
    var myMenu = document.getElementById("formAlbum");
    if (menuAlbum == false) {
        myMenu.style.display = "initial";
    }
    else {
        myMenu.style.display = "none";
    }
    menuAlbum = !menuAlbum;
}

//// ARREGLAR!
function getDevice() {
    var menuChar = document.getElementById("show-albums-menu");
    if(menuChar.style.display != "initial")
    {
        alert("Qué rollo");
    }
}