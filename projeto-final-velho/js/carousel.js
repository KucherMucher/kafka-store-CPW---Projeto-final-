const carouselContainer = document.getElementById('carousel-container');

function initCarousel(){
    const carouselContainer = document.getElementById('carousel-container');
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

    move_left.addEventListener("click", function(){Move_left(move_left, move_right)});
    move_right.addEventListener("click", function(){Move_right(move_left, move_right)});

}

function Move_right(move_left, move_right){
    move_left.disabled = true;
    move_right.disabled = true;

// with transition
    const track = carouselContainer.querySelector(".carousel-track");
    const elementWidth = track.firstElementChild.offsetWidth;

// Animate
    track.style.transform = `translateX(-${elementWidth+75}px)`;
    let element_copy = track.firstElementChild.cloneNode(true)
    track.appendChild(element_copy)

    
    

    track.addEventListener("transitionend", function handler() {
        element_copy.remove()
        // After animation, move first to end and reset transform
        track.style.transition = "none";
        track.appendChild(track.firstElementChild);
        track.style.transform = "translateX(0)";
        // Force reflow to apply the transform instantly
        void track.offsetWidth;
        track.style.transition = "transform 0.5s";
        move_left.disabled = false;
        move_right.disabled = false;
        track.removeEventListener("transitionend", handler);
        
        
    });
    
}

function Move_left(move_left, move_right){
    move_left.disabled = true;
    move_right.disabled = true;
    
    const track = carouselContainer.querySelector(".carousel-track");
    const elementWidth = track.firstElementChild.offsetWidth;

    // Instantly move last to front and shift left (no animation)
    let element_copy = track.lastElementChild.cloneNode(true)
    track.insertBefore(element_copy, track.lastElementChild)
    
    track.style.transition = "none";
    track.insertBefore(track.lastElementChild, track.firstElementChild);
    track.style.transform = `translateX(-${elementWidth+75}px)`;
    void track.offsetWidth; // Force reflow

    // Animate back to normal
    track.style.transition = "transform 0.5s";
    track.style.transform = "translateX(0)";

    track.addEventListener("transitionend", function handler() {
        element_copy.remove()
        move_left.disabled = false;
        move_right.disabled = false;
        track.removeEventListener("transitionend", handler);
    });
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


