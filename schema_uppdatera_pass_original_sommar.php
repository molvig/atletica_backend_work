<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>



<h3>Lägg till pass i sommarschema 2015</h3>

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
    <label for="inputPassword3" class="col-sm-2 control-label">Information</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Extra information, ex flera instruktörer">
    </div>
  </div>
  
    <div class="form-group">
                    <label for="datetimepicker" class="col-sm-2 control-label">Starttid</label>
                    <div class="col-sm-4">
                        <input id="datetimepicker1" type="text" class="form-control"  >
                    </div>
                  
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
                <input id="datetimepicker2" type="text" class="form-control"  >
            </div>
          
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
				<option value="Monday">Måndag</option>
				<option value="Tuesday">Tisdag</option>
				<option value="Wednesday">Onsdag</option>
				<option value="Thursday">Torsdag</option>
				<option value="Friday">Fredag</option>
				<option value="Saturday">Lördag</option>
				<option value="Sunday">Söndag</option>
				</select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Instruktör</label>
    <div class="col-sm-4">
     <select name="pass" class="form-control">
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
				<option value="summer">Sommar</option>
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










