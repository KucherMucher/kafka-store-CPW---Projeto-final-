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
        pageLink: '../page.html',
        class: 'carousel1'
    },
    {
        id: 2,
        src: 'images/carousel2.png',
        pageLink: '../page.html',
        class: 'carousel2'

        
    },
    {
        id: 3,
        src: 'images/carousel3.png',
        pageLink: '../page.html',
        class: 'carousel3'
        
    },
    {
        id: 4,
        src: 'images/carousel4.png',
        pageLink: '../page.html',
        class: 'carousel4'
        
    },
    {
        id: 5,
        src: 'images/carousel5.png',
        pageLink: '../page.html',
        class: 'carousel5'
        
    },
    {
        id: 6,
        src: 'images/carousel6.png',
        pageLink: '../page.html',
        class: 'carousel6'
        
    }
    
];

function createCarouselElements(){
    carouselContainer.innerHTML = '';

    imagesCarousel.forEach((image, id) => {
        // group
        const carousel_group = document.createElement('div');
        carousel_group.className = 'carousel-element ';

        const carousel_element = document.createElement('div');
        carousel_element.className = 'carousel-image ' + image.class 

        // img
        
        // link
        const carousel_button = document.createElement('a');
        carousel_button.href = image.pageLink;

        carousel_button.dataset.id = id;
        carousel_button.innerHTML = "ver ->"
        carousel_button.className = 'carousel-button';

        carousel_element.appendChild(carousel_button);

        carousel_group.appendChild(carousel_element);

        carouselContainer.appendChild(carousel_group);
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

        createCarouselElements();

        console.log('created carousel elements')
    }
    catch (error){
        console.error('Error init carousel', error)
        alert('There was an error setting carousel elemetns. Reload the page.')
    }

}


