//functions//
function SetGenre(Genre){
    sessionStorage.setItem("Genre", Genre);
    window.location.replace("../../../index.html");
}