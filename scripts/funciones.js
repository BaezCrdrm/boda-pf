var menuBool = false;

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
     var art = document.getElementsByClassName("cart");

     if(size < 800)
     {       
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "none";
        }  
        imgMenu.style.display = "inline";
        document.getElementById("menu").style.marginTop = "40px";
        
        for(var index = 0; index < art.length; index++) {
            art[index].style.columnCount = "1";
        }
     }
     else {
        for (var index = 0; index < a_menu.length; index++) {
            a_menu[index].style.display = "inline";
        }
        imgMenu.style.display = "none";
        document.getElementById("menu").style.marginTop = "72px";
        
        for(var index = 0; index < art.length; index++) {
            art[index].style.columnCount = "2";
        }
     }
     
     a_menu = null;
     art = null;
}

function mostrarMenu()
{
    var ul_menu = document.getElementById("ul_menu");

    if(/*ul_menu.children[0].style.display == "none"*/ menuBool == false)
    {   
        for (var index = 0; index < ul_menu.childElementCount; index++) {
            ul_menu.children[index].style.display = "list-item";
        }
        menuBool = true;
    }
    else {
        cierra(ul_menu, true);
        menuBool = false;
    }
}

function cierra(ul_menu, myBool) {
    if(/*myBool == true*/ menuBool == true) {
        for (var index = 0; index < ul_menu.childElementCount; index++) {
            ul_menu.children[index].style.display = "none";
        }
    }
}

function getTime() {
    now = new Date();
    y2k = new Date("Jul 23 2016 17:30:00");
    days = (y2k - now) / 1000 / 60 / 60 / 24;
    daysRound = Math.floor(days);
    hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
    hoursRound = Math.floor(hours);
    minutes = (y2k - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
    minutesRound = Math.floor(minutes);
    seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
    secondsRound = Math.round(seconds);
    // sec = (secondsRound == 1) ? " segundo" : " segundos";
    // min = (minutesRound == 1) ? " minuto" : " minutos, ";
    // hr = (hoursRound == 1) ? " hora" : " horas, ";
    // dy = (daysRound == 1) ? " día" : " d&iacute;as, "
    // document.getElementById("timer").innerHTML = "Faltan " + daysRound + dy + hoursRound + hr + minutesRound + min + secondsRound + sec;
    document.getElementById("timer").innerHTML = daysRound + "d " + hoursRound + "h " + minutesRound + "m " + secondsRound;
    newtime = window.setTimeout("getTime();", 1000);
}

function cambiaRuta(valor){
    if (valor == "coca") {
        document.getElementById("deCarretera").style.display = "none";
        document.getElementById("deCoca").style.display = "inline";         
    }
    else if(valor == "coatepec") {
        document.getElementById("deCoca").style.display = "none";  
        document.getElementById("deCarretera").style.display = "inline";  
    }

    initMap();
}

function initMap() {
  var chicago = {lat: 41.85, lng: -87.65};
  var indianapolis = {lat: 39.79, lng: -86.14};

  var map = new google.maps.Map(document.getElementById('map'), {
    center: chicago,
    scrollwheel: false,
    zoom: 7
  });

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: indianapolis,
    origin: chicago,
    travelMode: google.maps.TravelMode.DRIVING
  };

  // Pass the directions request to the directions service.
  var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // Display the route on the map.
      directionsDisplay.setDirections(response);
    }
  });
}