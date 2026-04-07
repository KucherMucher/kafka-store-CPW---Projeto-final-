/*
Ctrl + F5 se nao autaliza
*/ 

var calendar;
var event_list = [];

document.addEventListener('DOMContentLoaded', function() {
    console.log("casdsad");
    var calendarElement = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarElement, {
        // dont use this -----> plugins: [ FullCalendar.bootstrap5Plugin ], NEVER!!!!!!!!! NEEEEEVEEEEEERRRR!!!!!
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        dateClick: function(info) {
        // Scroll to or navigate to a section with id="section-YYYY-MM-DD"
        //window.location.href = '?page=calendario&popup=ace&date=' + info.dateStr; // maybe instead of changing a link, create a function that opens popup?
            var events = calendar.getEvents();
            console.log("1 click");
            console.log(event_list)
            eventPopup(event_list.find(current_event => current_event['date'] == info.dateStr), info.dateStr)
                // dont do this, bad writing. Use the php version instead, as it has all the things needed
        }
    });

    event_list.forEach(event => {
        calendar.addEvent({
        id: event['id_event'],
        title: event['event_name'],
        start: event['date']
        });
    });
    calendar.render();

    document.getElementById('createNewPage').addEventListener('click', createNewPage);
});

function SetEventList(el){
    event_list = el;
    console.log(event_list);
}


function eventPopup(event, date){
    ClearModal()
    console.log(event)
    var popup = new bootstrap.Modal(document.getElementById('calendarioPopup'));
    //const modalHeader = document.getElementsByClassName('modal-header')[0];
    document.getElementById('modalDate').textContent = date
    popup.show();
/*
    var h2 = document.createElement('h2');
    h2.innerHTML = date;
    modalHeader.appendChild(h2);*/


    if (event != null ){
        createContentWithEvent(event)
    }
    else{
        createStartingPages()
    }
}


function createContentWithEvent(event){
    const modalBody = document.getElementsByClassName('modal-body')[0];
    const pages = document.getElementsByClassName('pages')[0];
    console.log(event['music_url'])  
    document.getElementById('music').value = event['music_url']
    document.getElementById('video').value = event['video_url']
    page_array = pageParser(event['pages'])
    console.log(page_array)

    for(let i=0; i<page_array.length; i++){
        createPage(i+1, page_array[i])
    }
}

function pageParser(string){
    // parse symbol - [\\]
    return string.split('[\\]') 
    
}

function createNewPage(){
    const pages = document.getElementsByClassName('pages')[0];
    n_page = pages.getElementsByClassName('page').length + 1;

    createPage(n_page)
}

function createPage(n_page=0, textarea_text=''){
    const pages = document.getElementsByClassName('pages')[0];

    console.log("happening")
    var iStr = n_page.toString()
    var pageStr = 'page' + iStr

    var page = document.createElement('div')
    page.className = 'mb-3 page'

    var label = document.createElement('label')
    label.htmlFor = pageStr
    label.className = 'form-label'
    label.innerHTML = 'Página ' + iStr

    var removeButton = document.createElement('button')
    removeButton.type = 'button'
    removeButton.className = "btn btn-primary removeButton"
    // removeButton.id = "removeButton" + iStr
    removeButton.dataset.page = iStr
    removeButton.addEventListener('click', removePage);
    removeButton.innerHTML = '-'
    label.appendChild(removeButton)

    var textarea = document.createElement('textarea')
    textarea.className = 'form-control'
    textarea.id = pageStr
    textarea.rows = '3'
    textarea.placeholder = 'Texto para página ' + iStr
    textarea.name = 'page' + iStr

    textarea.innerHTML = textarea_text

    page.appendChild(label)
    page.appendChild(textarea)

    pages.insertBefore(page, document.getElementById('createNewPage'))
}

function createStartingPages(){
    createPage(1); createPage(2);

    
}

function ClearModal(){
    document.getElementsByClassName('pages')[0].querySelectorAll('div').forEach(div => div.remove());
    document.getElementById('music').value = '';
    document.getElementById('video').value = '';
}

function removePage(){
    const n_page = event.target.dataset.page;
    console.log("page" + n_page)

    const div = event.target.closest('.mb-3');
    if (div){div.remove()}
    correctPages(n_page)
}

function correctPages(n_page){
    document.getElementsByClassName('page').forEach(page =>{
        
    });

}