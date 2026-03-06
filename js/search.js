const searchContainer = document.querySelector('#searchContainer');

/*
    Two options:
        . execute a functionv for every element that was found using search
        (less efficient, less work)

        OR

        . execute the script after getting every element
        (more eficient, more work) ig will go with this
*/

function initSearchContainer(thelist){
    if (thelist){
        console.log("Succesefuly connected zasdphp to js")
        //console.log(thelist)
    } else {
        console.log("nope...")
    }
}

function createSearchResultElement(/*id,*/ id_man, nami, price, img){
    const currentElement = document.createElement('div');
    currentElement.className = 'searchElement';
    console.log(currentElement);
    currentElement.innerHTML = `<img src="${img}" alt="product image"> <p class="mb-0">${nami}</p> <p>${price}€</p>`; //temporary???? maybe not
    searchContainer.appendChild(currentElement);
}

function initSearchContainer(thelist){
    thelist.forEach(row => {
        let id       = row['id_product'];
        let id_man   = row['id_manufacturer'];
        let nami     = row['product_name'];
        let quantity = row['quantity'];
        let price    = row['price'];
        let about    = row['about'];
        let specs    = row['specs'];
        let img      = row['img'];
        createSearchResultElement(id_man, nami, price, img);

        console.log(id)
    });
}

