calendario

<div class="calendar" id="calendar"></div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function(info) {
        // Scroll to or navigate to a section with id="section-YYYY-MM-DD"
        window.location.href = '?page=ace&date=' + info.dateStr;
        // Or, for a full redirect: window.location.href = '#section-' + info.dateStr;
        }
    });
    calendar.render();
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>