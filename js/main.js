document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loading - main');
    // Todo o código da galeria será colocado aqui
    loadScript(carousel, function() {initCarousel();})
});

carousel = "./js/carousel.js"
mtum = ".js/move_the_unmovable.js"

function loadScript(src, callback){
    const script = document.createElement('script');
    script.src = src;
    script.onload = callback
    document.body.append(script)
}
