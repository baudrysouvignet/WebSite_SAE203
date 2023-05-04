/*---------------------------------------------------------------------------------------------------------
Ce code Js est nécessaire a l'ux design lors de la partie 1, il ne fait donc pas partie des 3 intégrations
---------------------------------------------------------------------------------------------------------*/

/*déclarations des variables*/
var elements = document.querySelectorAll('.filtre, #affiche');
const filtre = document.querySelector('.filtre');
const popup = document.querySelector('#popup');

/**
 * Fonction pour changer les class
 */
function toggleUnactive() {
    filtre.classList.toggle('unactive');
    popup.classList.toggle('unactive');
}

/**
 * ajoute un écouteur d'événements "click" à chaque élément sélectionné
 */
elements.forEach(function(element) {
    element.addEventListener('click', function() {
        /*vérifie si l'élément a la classe "unactive"*/
        if (this.classList.contains('unactive')) {
            /*si l'élément a la classe "unactive", la supprime*/
            toggleUnactive()
        } else {
            /*sinon, ajoute la classe "unactive"*/
            toggleUnactive()
        }
    });
});


/**
 * Affiche un shamp de formulaire si le select est sur 'autre'
 *
 * @param type
 */
function showInput(type) {
    const select = document.getElementById("select_"+type);
    const label = document.getElementById("label_select_"+type);
    const inputContainer = document.getElementById("input-container_"+type);

    /*verification si la valeur est autre*/
    if (select.value === "autre") {
        /*on fait apparaitre les éléments*/
        inputContainer.style.display = "block";
        select.style.display = "none";
        label.style.display = "none";
    }
}