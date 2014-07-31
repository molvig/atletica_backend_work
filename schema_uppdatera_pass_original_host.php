<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>



<h3>Lägg till pass i höstschema 2014</h3>

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
    <label for="inputEmail3" class="col-sm-2 control-label">Startar</label>
    <div class="col-sm-4">
				<select name="start" class="form-control">
				<option value="Sandra">16.00</option>
				<option value="Olivia">16.15</option>
				<option value="Ellinor">16.30</option>
				</select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Slutar</label>
    <div class="col-sm-4">
				<select name="slut" class="form-control">
				<option value="Sandra">17.00</option>
				<option value="Olivia">17.15</option>
				<option value="Ellinor">17.30</option>
				</select>
    </div>
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
     <select name="pass" class="form-control">
          <?php echo $instruktor ?>
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

