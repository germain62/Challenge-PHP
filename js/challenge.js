document.getElementById('scrollTop').addEventListener("click", function() {
    scrollTop();
});

function scrollTop() {
    //On va scroller petit a petit vers le haut en scrollant de 100 pixels toutes les 10 millisecondes
    var myVar = setInterval(function() {
        window.scrollBy(0, -100); //on scroll de 100 pixel vers le haut (on enleve 100 pixel au scroll actuel)
        if(window.pageYOffset <= 0){//si on est en haut on arrete la repetition de l'action
        	clearInterval(myVar);
        }
    }, 10);
}
