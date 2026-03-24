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
          <h1 class="modal-title fs-5" id="modalDate"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="pages border border-2 rounded-2 p-2 mb-3">
                <div class="mb-3">
                  <label for="page1" class="form-label">Página 1</label>
                  <textarea class="form-control" id="page1" rows="3" placeholder="Texto para página 2"></textarea>
                </div> 

                <div class="mb-3">
                  <label for="page2" class="form-label">Página 2</label>
                  <textarea class="form-control" id="page2" rows="3" placeholder="Texto para página 2"></textarea>
                </div> 
                <button type="button" class="btn btn-primary" id="createNewPage">+</button>
            </div>

            <div class="music border border-2 rounded-2 p-2 mb-3">
              <div class="mb-3">
                <label for="music" class="form-label">Música</label>
                <input type="text" class="form-control" id="music" placeholder="URL de Youtube">
              </div> 
            </div>

            <div class="video border border-2 rounded-2 p-2">
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Vídeo</label>
                <input type="text" class="form-control" id="video" placeholder="URL de Youtube">
              </div> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="./js/calendar.js">  
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
    echo '<script>SetEventList('.json_encode($event_list).');</script>';

?>


