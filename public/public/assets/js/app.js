//my js files
document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#image-carousel' ).mount();
  } );

//bouton clicked
const formElements = document.querySelectorAll('.form-nary');

formElements.forEach(element => {
    element.addEventListener('click', function() {
        // Ajoute la classe "clicked" lorsque l'élément est cliqué
        element.classList.add('clicked');
    });

    element.addEventListener('blur', function() {
        // Supprime la classe "clicked" lorsque l'élément perd le focus
        element.classList.remove('clicked');
    });
});


 //caroussel
 $(document).ready(function () {
    const $slider = $('.slider-container');
    const $cards = $('.card');
    const cardWidth = $cards.first().outerWidth();
    let currentIndex = 0;

    function updateSliderPosition() {
        $slider.css('transform', `translateX(-${currentIndex * cardWidth}px)`);
    }

    $('.next-button').click(function () {
        // Défilement vers la droite (suivant)
        if (currentIndex < $cards.length - 1) {
            currentIndex += 1; // Avance d'un élément par clic
        } else {
            currentIndex = 0; // Revenir au début du carrousel si nous atteignons la fin
        }
        updateSliderPosition();
    });

    $('.prev-button').click(function () {
        // Défilement vers la gauche (précédent)
        if (currentIndex > 0) {
            currentIndex -= 1; // Recule d'un élément par clic
        } else {
            currentIndex = $cards.length - 1; // Revenir à la fin du carrousel si nous sommes au début
        }
        updateSliderPosition();
    });
});



