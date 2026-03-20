calendario
<!-- 
idea:
    . when clicked on a date, pop up the add/edit oracao to a date
-->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.11/index.global.min.js"></script>
<div>
  <div class="calendar" id="calendar"></div>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#calendarioPopup">
    Launch demo modal
  </button>

  <div class="modal fade" id="calendarioPopup" tabindex="-1" aria-labelledby="calenarioPopup" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  var calendar;
  function eventPopup(date, event){
    var popup = new bootstrap.Modal(document.getElementById('calendarioPopup'));
    popup.show()
    
    if (event != None){

    }
  }
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

        eventPopup(info.dateStr, 
          events.some(event => event.startStr === info.dateStr) ? events : None)
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


