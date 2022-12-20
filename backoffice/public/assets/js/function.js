document.getElementById("message").addEventListener("click", myFunction);

function myFunction() {
    var element = document.getElementById("message");
    if(element.style.display == none){
        element.style.display = block;
    }
    else{
        element.style.display = none;
    }
    //Pour masquer la division :
    // document.getElementById(identifiant_de_ma_div).style.display = none;
    ///Pour afficher la division :
    // document.getElementById(identifiant_de_ma_div).style.display = block;
}