// for now discontinued

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loading - main');
    // Todo o código da galeria será colocado aqui
    const main = document.getElementsByTagName("main")
    switch (main.id){
        case 'home':
            loadScript(carousel, function() {initCarousel();})
            break;
        case 'search':
            break;
    }
    
});

carousel = "./js/carousel.js"
search   = "./js/search.js"

function loadScript(src, callback){
    const script = document.createElement('script');
    script.src = src;
    script.onload = callback
    document.body.append(script)
}
