var calendar;
var event_list = [];

document.addEventListener('DOMContentLoaded', function() {
    var calendarElement = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarElement, {
        // dont use this -----> plugins: [ FullCalendar.bootstrap5Plugin ], NEVER!!!!!!!!! NEEEEEVEEEEEERRRR!!!!!
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        dateClick: function(info) {
        // Scroll to or navigate to a section with id="section-YYYY-MM-DD"
        //window.location.href = '?page=calendario&popup=ace&date=' + info.dateStr; // maybe instead of changing a link, create a function that opens popup?
            var events = calendar.getEvents();
            console.log("click")
            eventPopup(info.dateStr, 
                events.some(event => event.startStr === info.dateStr) ? events.find(event => event.startStr === info.dateStr) : null)
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
});

function SetEventList(el){
    event_list = el;
}


function eventPopup(date, event){
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
}

function createContentWithEvent(event){
    const modalBody = document.getElementsByClassName('modal-body')[0];
    console.log(event['music_url'])  
    document.getElementById('music').value = event['music_url']
    document.getElementById('video').value = event['video_url']
    // create a parser in js that will parse one single string into different pages
}



/*calendar.addEvent({
    //    id: 'a',
        title: 'event',
        start: '2026-03-17'
        });

        calendar.addEventSource([
        {title: 'a', start: '2026-03-12'},
        {title: 'b', start: '2026-03-14'}
        ]);*/