/*déclarations des variables*/

let car = document.querySelector('#car');
let carContent = document.querySelector('#carContent');
let carBtns = document.querySelectorAll('.carBtn');

let carContentGap = 100;
let lastClickTime = 0;
let autoScrollIntervalId = null;

/*fonctions de déplacement*/

/**
 * Incrémente a gauche le carrousel
 *
 * @param {int} taille - Taille d'une slide
 * @param {int} carWidth - Taille du content des slides
 */
function mooveRight(taille, carWidth){
    /*Comparaison pour savoir si le caroussel est à la fin*/
    if (carWidth > (-(carContent.clientWidth + carContentGap) * 4)){
        car.style.marginLeft = carWidth - taille + "px"; /*incrémente d'un a gauche le carroussel*/
    } else {
        car.style.marginLeft = "0px" /*retourne au début*/
    }
}

/**
 * Incrémente a droite le carrousel
 *
 * @param {int} taille - Taille d'une slide
 * @param {int} carWidth - Taille du content des slides
 */
function mooveLeft(taille, carWidth) {
    /*Comparaison pour savoir si le caroussel est au début*/
    if (carWidth < 0){
        car.style.marginLeft = carWidth + taille + "px";/*incrémente d'un a droite le carroussel*/
    } else {
        let last = (carContent.clientWidth + carContentGap) * 4 ;
        car.style.marginLeft = carWidth - last + "px"; /*retourne au début*/
    }
}


/**
 * Début le timer de 5s pour l'automatisation du carrousel
 */
function startAuto() {
    /*création de la boucle de 5s*/
    autoScrollIntervalId = setInterval(function() {
        change('right');
    }, 5000);
}

/**
 * Restart du timer de 5s pour l'automatisation du carrousel pour eviter les interference avec le click des btn
 */
function resetAuto() {
    /*verification si le timer est en court*/
    if (autoScrollIntervalId !== null) {
        /*efface le timer*/
        clearInterval(autoScrollIntervalId);
        autoScrollIntervalId = null;
    }
    /*crée un nouveau timer*/
    startAuto();
}

/**
 * Fonction qui permet d'appeler les autres fonctions et de reset les données des fonctions
 *
 * @param {string} type
 */
function change(type) {
    let taille = carContent.clientWidth + carContentGap;
    let carWidth = parseInt(window.getComputedStyle(car).marginLeft);

    if (type == 'left'){
        mooveLeft(taille, carWidth)
    } else {
        mooveRight(taille, carWidth)
    }
}

/**
 * Ecoute du bouton play/pause au click pour alterner
 */
document.querySelector('#playpause').addEventListener('click', function (){
    /*verification si l'élement contiens l'id pause*/
    if (this.classList.contains('pause')){
        /*stop le timer*/
        clearInterval(autoScrollIntervalId);
        autoScrollIntervalId = null;
    } else {
        /*recommence le timer de 5s*/
        startAuto();
    }

    /*change les class de l'élément*/
    this.classList.toggle('pause')
    this.classList.toggle('play')
})

/**
 * Parcours tout les éléments de carBtns
 *
 * fonction qui écoute le click de chaque élément
 */
carBtns.forEach(function(element) {
    element.addEventListener('click', function() {

        /*Verifie le temps du dernier click pour éviter des décalage*/
        let now = new Date().getTime();
        if (now - lastClickTime < 800) {
            /*Si ca fait moins de 800ms on arrete tout*/
            return;
        }
        /*Remplace avec le temps actuelle (dernier click)*/
        lastClickTime = now;

        /*Reset le timer de 5s pour éviter d'en créer un nouveau a chaque click et donc créer énormement de bug */
        resetAuto();

        /*Incrémente le carrousel dépendement du bouttons sur le quelle on click*/
        change(this.id)

    });
});

startAuto();
