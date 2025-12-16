document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loading - carousel');

    // Todo o código da galeria será colocado aqui
    initCarousel();
});

function initCarousel(){
    const carouselContainer = document.querySelector("#carousel-container");

    if(!carouselContainer){
        console.log("carousel Conainer not found");
        return;
    }

    console.log("carousel Container found");
}

const imagesCarousel = [ //struct list
    {
        id: 1,
        src: '../images/carousel1.jpg',
        pageLink: '../page.html'
    },
    {
        id: 2,
        src: '../images/carousel2.jpg',
        pageLink: '../page.html'

        
    },
    {
        id: 3,
        src: '../images/carousel3.jpg',
        pageLink: '../page.html'
        
    },
    {
        id: 4,
        src: '../images/carousel4.jpg',
        pageLink: '../page.html'
        
    },
    {
        id: 5,
        src: '../images/carousel5.jpg',
        pageLink: '../page.html'
        
    },
    {
        id: 6,
        src: '../images/carousel6.jpg',
        pageLink: '../page.html'
        
    },
    {
        id: 7,
        src: '../images/carousel7.jpg',
        pageLink: '../page.html'
        
    },
];




