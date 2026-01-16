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

let carouselIndex = 0;

function createCarouselElements(){
    carouselContainer.innerHTML = '';

    let oldTrack = carouselContainer.querySelector('.carousel-group')
    if (oldTrack) {oldTrack.remove();}

    const track = document.createElement('div')
    track.className = "d-flex carousel-track"

    imagesCarousel.forEach((image, id) => {
        // group
        const carousel_group = document.createElement('div');
        carousel_group.className = 'carousel-element ';

        const carousel_element = document.createElement('div');
        carousel_element.className = 'carousel-image' + ' ' + image.class 

        // img
        
        // link
        const carousel_button = document.createElement('a');
        carousel_button.href = image.pageLink;

        carousel_button.dataset.id = id;
        carousel_button.innerHTML = "ver ->"
        carousel_button.className = 'carousel-button';

        carousel_element.appendChild(carousel_button);

        carousel_group.appendChild(carousel_element);

        track.appendChild(carousel_group);
    });
    carouselContainer.appendChild(track)
    console.log("Created carousel images")
}


function createCarouselMoveButtons(){
    const move_buttons = document.createElement('div');

    // left
    const move_left = document.createElement('button');
    move_left.className = "move-button left"

    span = document.createElement('span');
    embed = document.createElement('embed');

    embed.src = "images/move_button.svg";
    embed.className = "move-button-embed left";

    span.appendChild(embed);
    move_left.appendChild(span); 

    // right
    const move_right = document.createElement('button');
    move_right.className = "move-button right"

    span1 = document.createElement('span');
    embed1 = document.createElement('embed');

    embed1.src = "images/move_button.svg";
    embed1.className = "move-button-embed right";
    
    span1.appendChild(embed1);
    move_right.appendChild(span1);

    // both

    move_buttons.appendChild(move_left)
    move_buttons.appendChild(move_right)

    carouselContainer.appendChild(move_buttons)

    move_left.addEventListener("click", function(){Move_left()});
    move_right.addEventListener("click", function(){Move_right()});

}

function updateCarouselPosition(){
    const track = carouselContainer.querySelector('.carousel-track');
    const elementWidth = 294 + 2 * (parseInt(getComputedStyle(track.firstChild).marginLeft) || 0); // adjust if you have margin
    track.style.transform = `translateX(-${track.firstChild + elementWidth}px)`;
}

function Move_left(){
    carouselIndex = (carouselIndex - 1 + imagesCarousel.length) % imagesCarousel.length;
    updateCarouselPosition();
    console.log("move left", carouselIndex);

    const track = carouselContainer.querySelector(".carousel-track");
    child = track.firstChild;
    track.firstChild.remove()
    track.appendChild(child);
}

function Move_right(){
    
    carouselIndex = (carouselIndex + 1) % imagesCarousel.length;
    updateCarouselPosition();
    console.log("move right", carouselIndex)
}


function initCarousel(){
    console.log("Init carousel...")

    try{
        if(!carouselContainer){
            throw new Error('Didnt find necessary elements')
        }

        createCarouselElements();

        createCarouselMoveButtons();

        console.log('created carousel elements')
    }
    catch (error){
        console.error('Error init carousel', error)
        alert('There was an error setting carousel elemetns. Reload the page.')
    }

}


