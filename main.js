//variables//
let TextValue = document.getElementById("TitleGamescreen");
let Game1 = document.getElementById("Game1");
let Game2 = document.getElementById("Game2");

let logincheck = false;

//site onload//
if(logincheck == true){
    if(sessionStorage.getItem("Username") == null){
        window.location.replace("./src/Subdomeinen/LoginFiles/index.php");
    }
}

if(sessionStorage.getItem("Genre") != null){
    var SessionStorageValue = sessionStorage.getItem("Genre");

    if(SessionStorageValue == "Woorden"){
        TextValue.innerHTML = "Woorden";
    } else if(SessionStorageValue == "Getallen"){
        TextValue.innerHTML = "Getallen";
    } else if(SessionStorageValue == "De_kleintjes"){
        TextValue.innerHTML = "De kleintjes (3 - 6)";
    } else if(SessionStorageValue == "Kinderen"){
        TextValue.innerHTML = "Kinderen (6 - 13)";
    } else if(SessionStorageValue == "Tieners"){
        TextValue.innerHTML = "Tieners (13 - 18)";
    } else if(SessionStorageValue == "Jongeren"){
        TextValue.innerHTML = "Jongeren (18 - 21)";
    } else if(SessionStorageValue == "Volwassenen"){
        TextValue.innerHTML = "Volwassenen (21 - 65)";
    } else if(SessionStorageValue == "Ouderen"){
        TextValue.innerHTML = "Ouderen (65+)";
    }
}

//functions//
function StartGame(GameNaam){
    sessionStorage.setItem("Game", GameNaam);
    window.location.replace("./src/Subdomeinen/Game/index.html");
}