// sélectionne les éléments .filtre et #affiche
var elements = document.querySelectorAll('.filtre, #affiche');
const filtre = document.querySelector('.filtre');
const popup = document.querySelector('#popup');

// Fonction pour ajouter ou enlever la classe "unactive"
function toggleUnactive() {
    filtre.classList.toggle('unactive');
    popup.classList.toggle('unactive');
}

// ajoute un écouteur d'événements "click" à chaque élément sélectionné
elements.forEach(function(element) {
    element.addEventListener('click', function() {
        // vérifie si l'élément a la classe "unactive"
        if (this.classList.contains('unactive')) {
            // si l'élément a la classe "unactive", la supprime
            toggleUnactive()
        } else {
            // sinon, ajoute la classe "unactive"
            toggleUnactive()
        }
    });
});
