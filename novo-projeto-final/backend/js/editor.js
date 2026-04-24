/*

------------------~~~ How to make an preset (or basicaly page editor) ~~~------------------
        o What to have in mind:
            . this will change the css of the elements (color, position, size, patterns, ...)
            . for now, we will use buttons to do this
            . concentrate on creating a simple preset editor, dont complicate things
            . also modify each element

*/ 

document.addEventListener("DOMContentLoaded", function(){
    console.log("loading editor");
});


function Change_BG_Color(color){
    main = document.getElementsByTagName("main");
    main.style = "background-color: "+color+"";
}

function Change_Text_Color(color){
    
}

