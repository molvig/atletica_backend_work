<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>

<script type="text/javascript">
  //document.getElementById("starttid").value = document.getElementById("datetimepicker1").value;
  //$( "#datetimepicker1" ).click(function() {  
  function changeHiddenStart()
  {  
  document.getElementById("starttid").value = document.getElementById("datetimepicker1").value;  
}

 function changeHiddenSlut()
  {  
  document.getElementById("sluttid").value = document.getElementById("datetimepicker2").value;  
}

</script>

<h3>Lägg till pass i schema 2014</h3>

<form class="form-horizontal" role="form" action="#" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pass</label>
    <div class="col-sm-4">
     <select name="pass" class="form-control">
          <?php echo $pass ?>
        </select><span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
    </div>
  </div>
    <div class="form-group">
    <label for="platser" class="col-sm-2 control-label">Antal platser</label>
    <div class="col-sm-4">
      <input type="number" name="platser" min="0" max="100" class="form-control" id="platser" >
    </div>
  </div>
    <div class="form-group">
                    <label for="datetimepicker" class="col-sm-2 control-label">Starttid</label>
                    <div class="col-sm-4">
                        <input id="datetimepicker1" type="text" class="form-control"  onchange="changeHiddenStart()" >
                    </div>
                  <input type="hidden" id="starttid" name="starttid" value=""/> 

                <script>
                  jQuery('#datetimepicker1').datetimepicker({
                    datepicker:false,
                    format:'H:i'
                  });
                </script> 
  </div>
  
  <div class="form-group">
            <label for="datetimepicker" class="col-sm-2 control-label">Sluttid</label>
            <div class="col-sm-4">
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut()" >
            </div>
          <input type="hidden" id="sluttid" name="sluttid" value=""/> 
        <script>
          jQuery('#datetimepicker2').datetimepicker({
            datepicker:false,
            format:'H:i'
          });
        </script> 
</div>
  </div>

 <!--<div class="form-group">
  <div class="col-sm-10">
    <label for="tiden" class="col-sm-2 control-label">Tid</label>
    <input type="time">
    <input type="date" class="form-control" id="tiden">
</div> 
   </div> -->
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Veckodag</label>
    <div class="col-sm-4">
        <select name="days" class="form-control">
        <option value="1">Måndag</option>
        <option value="2">Tisdag</option>
        <option value="3">Onsdag</option>
        <option value="4">Torsdag</option>
        <option value="5">Fredag</option>
        <option value="6">Lördag</option>
        <option value="7">Söndag</option>
        </select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Instruktör</label>
    <div class="col-sm-4">     
     <select name="instruktor" class="form-control">
          <?php echo $instnamnet ?>
        </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
    </div>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label for="schema" class="col-sm-2 control-label">Vilket schema?</label>
    <div class="col-sm-4">
        <select name="schema" class="form-control">
        <option value="3">Höst</option>
        </select>
    </div>
  </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Uppdatera</button>
    </div>
  </div>
</form>
</div>

<?php include("inc/footer.php"); ?>

