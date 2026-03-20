var calendar;

function eventPopup(date){
    event_list
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarElement = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarElement, {
        // dont use this -----> plugins: [ FullCalendar.bootstrap5Plugin ], NEVER!!!!!!!!! NEEEEEVEEEEEERRRR!!!!!
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        dateClick: function(info) {
        // Scroll to or navigate to a section with id="section-YYYY-MM-DD"
        window.location.href = '?page=calendario&popup=ace&date=' + info.dateStr; // maybe instead of changing a link, create a function that opens popup?
        
        }
    });
        /*calendar.addEvent({
    //    id: 'a',
        title: 'event',
        start: '2026-03-17'
        });

        calendar.addEventSource([
        {title: 'a', start: '2026-03-12'},
        {title: 'b', start: '2026-03-14'}
        ]);*/
    event_list.forEach(event => {
        calendar.addEvent({
        id: event['id_event'],
        title: event['event_name'],
        start: event['date']
        });
    });
    calendar.render();
});

