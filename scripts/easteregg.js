function merry(h1) {
    h1.innerHTML = "Will you merry me?...<br> I wanna wish you a Merry Christmas";
    audioPlayer("../multimedia/mc.mp3");
}

function audioPlayer(file) {
    var hs = document.getElementById("hs");
    hs.src = file;
    hs.play();
}