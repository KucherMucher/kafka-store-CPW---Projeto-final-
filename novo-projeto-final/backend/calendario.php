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
          <form method="POST" action="index.php?page=calendario" class="modal-form">
            <div class="event-name border border-2 rounded-2 p-2 mb-3">
              <div class="mb-3">
                <label for="event-name" class="form-label">Título</label>
                <input type="text" class="form-control" id="event-name" placeholder="Título da Oração" name="eventname">
              </div>
            </div>
            <div class="pages border border-2 rounded-2 p-2 mb-3">
                <!-- <div class="mb-3">
                  <label for="page1" class="form-label">Página 1</label>
                  <textarea class="form-control" id="page1" rows="3" placeholder="Texto para página 2"></textarea>
                </div> 

                <div class="mb-3">
                  <label for="page2" class="form-label">Página 2</label>
                  <textarea class="form-control" id="page2" rows="3" placeholder="Texto para página 2"></textarea>
                </div> -->
                <button type="button" class="btn btn-primary" id="createNewPage">+</button>
            </div>

            <div class="music border border-2 rounded-2 p-2 mb-3">
              <div class="mb-3">
                <label for="music" class="form-label">Música</label>
                <input type="text" class="form-control" id="music" placeholder="URL de Youtube" name="music">
              </div> 
            </div>

            <div class="colors border border-2 rounded-2 p-2 mb-3">
              <h6>Cores</h6>
              <div class="mb-3 border border-1 rounded-2">
                <label for="bg-color" class="form-label p-2">Cor de fundo</label>
                <input type="color" id="bg-color" name="bg-color" value="#e66465"/>
              </div>
              <div class="mb-3 border border-1 rounded-2">
                <label for="text-color" class="form-label p-2">Cor de texto</label>
                <input type="color" id="text-color" name="text-color" value="#e66465"/>
              </div> 
            </div>

            <div class="image border border-2 rounded-2 p-2 mb-3">
              <div class="mb-3">
                <label for="image" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="image" placeholder="imagem" name="image">
              </div> 
            </div>

            <!--<div class="video border border-2 rounded-2 p-2">
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Vídeo</label>
                <input type="text" class="form-control" id="video" placeholder="URL de Youtube" name="video">
              </div> 
            </div>-->
            <button type="submit" class="btn btn-primary" >Save changes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

</div>
<script src="./js/calendar.js">  
</script>


<?php
    include "connect.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      print_r($_POST);
      $N_PAGES = $_COOKIE['N_PAGES'];
      $page_string = "";
      for ($i = 1; $i <= $N_PAGES; $i++){
        if ($i == $N_PAGES){$page_string .= $_POST["page$i"];}
        else{$page_string .= $_POST["page$i"]."[\\]";}
      }
      
      $result = $mysqli->query("SELECT MAX(id_event) AS last_id FROM events");
      $row = $result->fetch_assoc();
      $new_id = $row['last_id'] +1;
      $DATE = $_COOKIE['EVENT_DATE'];
      if ($_COOKIE['EDIT']==1){
        $edit = $mysqli->prepare("UPDATE events SET event_name=?, music_url=?, pages=? WHERE `date`=?");
        $edit -> bind_param("ssss", $_POST["eventname"], $_POST["music"], $page_string, $DATE);
        $edit -> execute();
        $edit -> close();
      }
      else{
        $send = $mysqli->prepare("INSERT INTO events (id_event, event_name, `date` , music_url, pages) VALUES (?,?,?,?,?)");
        $send -> bind_param("sssss", $new_id, $_POST["eventname"], $DATE, $_POST["music"], $page_string);
        $send -> execute();
        $send -> close();
      }
      header("Location: index.php?page=calendario");
    }

    $q = "SELECT * FROM events";

    $event_list = [];

    $result = $mysqli -> query($q);
    if ($result -> num_rows > 0){
      while ($raw = $result -> fetch_assoc()){
        $event_list[] = $raw;
        
      }
    }
    print_r($event_list); // debug
    echo '<script>SetEventList('.json_encode($event_list).');</script>';

?>


