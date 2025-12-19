document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loading - carousel');

    // Todo o código da galeria será colocado aqui
    initCarousel();
});

const carouselContainer = document.querySelector('#carousel-container');

function initCarousel(){
    

    if(!carouselContainer){
        console.log("carousel Conainer not found");
        return;
    }

    console.log("carousel Container found");
}

const imagesCarousel = [ //struct list
    {
        id: 1,
        src: 'images/carousel1.png',
        pageLink: '../page.html'
    },
    {
        id: 2,
        src: 'images/carousel2.png',
        pageLink: '../page.html'

        
    },
    {
        id: 3,
        src: 'images/carousel3.png',
        pageLink: '../page.html'
        
    },
    {
        id: 4,
        src: 'images/carousel4.png',
        pageLink: '../page.html'
        
    },
    {
        id: 5,
        src: 'images/carousel5.png',
        pageLink: '../page.html'
        
    },
    {
        id: 6,
        src: 'images/carousel6.png',
        pageLink: '../page.html'
        
    }
    
];

function createCarouselElemenets(){
    carouselContainer.innerHTML = '';

    imagesCarousel.forEach((image, id) => {
        const carousel_element = document.createElement('img');
        carousel_element.src = image.src;
        carousel_element.className = 'carousel-element';
        carousel_element.dataset.id = id;

        carouselContainer.appendChild(carousel_element);
    });

    console.log("Created carousel images")
}

function createCarouselImage(){
    
}

function createCarouselButton(){

}

function createCarouselMoveButtons(){

}



function initCarousel(){
    console.log("Init carousel...")

    try{
        if(!carouselContainer){
            throw new Error('Didnt find necessary elements')
        }

        createCarouselElemnets();

        console.log('created carousel elements')
    }
    catch (error){
        console.error('Error init carousel', error)
        alert('There was an error setting carousel elemetns. Reload the page.')
    }

}


