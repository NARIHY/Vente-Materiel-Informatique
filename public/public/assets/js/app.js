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
/*
this is errors
// Product carroussel infinie defilement
const carouselWrapper = document.querySelector('.carousel-wrapper');
const carouselSlides = document.querySelectorAll('.carousel-slide');

let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % carouselSlides.length;
    updateCarousel();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + carouselSlides.length) % carouselSlides.length;
    updateCarousel();
}

function updateCarousel() {
    const translateValue = -currentIndex * 100;
    carouselWrapper.style.transform = `translateX(${translateValue}%)`;
}

setInterval(nextSlide, 5000); // Changez l'intervalle de défilement en millisecondes (ici, toutes les 5 secondes)

*/
//supression de name of product ou les produit sont empty
    // Sélectionnez tous les éléments avec la classe "slider-container"
    const sliderContainers = document.querySelectorAll('.slider-container');

    // Parcourez chaque élément "slider-container"
    sliderContainers.forEach(container => {
        // Vérifiez si l'élément parent a la classe "empty"
        if (container.parentElement.classList.contains('empty')) {
            // Trouvez le h3 avec la classe "name-category"
            const nameCategory = container.querySelector('.name-category');
            if (nameCategory) {
                // Supprimez le h3
                nameCategory.remove();
            }
        }
    });







