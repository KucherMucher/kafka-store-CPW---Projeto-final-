calendario
<!-- 
idea:
    . when clicked on a date, pop up the add/edit oracao to a date
-->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.11/index.global.min.js"></script>

<div class="calendar" id="calendar">
  
</div>
<script>
  var calendar;
  document.addEventListener('DOMContentLoaded', function() {
    var calendarElement = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarElement, {
        // dont use this -----> plugins: [ FullCalendar.bootstrap5Plugin ], NEVER!!!!!!!!! NEEEEEVEEEEEERRRR!!!!!
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        dateClick: function(info) {
        // Scroll to or navigate to a section with id="section-YYYY-MM-DD"
        window.location.href = '?page=ace&date=' + info.dateStr;
        }
    });
    calendar.addEvent({
//    id: 'a',
      title: 'event',
      start: '2026-03-17'
    });

    calendar.addEventSource([
      {title: 'a', start: '2026-03-12'},
      {title: 'b', start: '2026-03-14'}
    ]);

    event_list.forEach(event => {
      calendar.addEvent({
        id: event['id_event'],
        title: event['event_name'],
        start: event['date']
      });
    });
      
    calendar.render();
  });

    function AddEventsByList(event_list){
      console.log(event_list)
      
    }
</script>


<?php
    include "connect.php";
    $q = "SELECT * FROM events";

    $event_list = [];

    $result = $mysqli -> query($q);
    if ($result -> num_rows > 0){
      while ($raw = $result -> fetch_assoc()){
        $event_list[] = $raw;
        
      }
    }
    print_r($event_list);
    echo '<script>var event_list = ' . json_encode($event_list) . ';</script>';

?>


