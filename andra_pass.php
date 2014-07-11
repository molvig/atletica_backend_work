<?php include("inc/db_con.php"); ?>
<?php include("inc/passnamn.php"); ?>
<?php include("inc/header.php"); ?>





<form class="form-horizontal" role="form" action="#" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pass</label>
    <div class="col-sm-10">
     <select name="pass" class="form-control">
					<?php echo $pass ?>
				</select><span class="help-block"><a href="nyttpass.php">Saknas passet? Klicka här</a></span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Information</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Extra information, ex flera instruktörer">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Startar</label>
    <div class="col-sm-10">
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
    <div class="col-sm-10">
				<select name="slut" class="form-control">
				<option value="Sandra">17.00</option>
				<option value="Olivia">17.15</option>
				<option value="Ellinor">17.30</option>
				</select>
    </div>
  </div>
  </div>

 <div class="form-group">
  <div class="col-sm-10">
    <label for="tiden" class="col-sm-2 control-label">Tid</label>
    <input type="time">
    <input type="date" class="form-control" id="tiden">
</div> 
   </div> 
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Veckodag</label>
    <div class="col-sm-10">
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
    <div class="col-sm-10">
				<select name="instruktorer" class="form-control">
				<option value="Sandra">Sandra</option>
				<option value="Olivia">Olivia</option>
				<option value="Ellinor">Ellinor</option>
				</select>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label for="schema" class="col-sm-2 control-label">Vilket schema?</label>
    <div class="col-sm-10">
				<select name="schema" class="form-control">
				<option value="spring">Vår</option>
				<option value="summer">Sommar</option>
				<option value="fall">Höst</option>
				<option value="xmas">Jul</option>
				<option value="easter">Påsk</option>
				</select>
    </div>
  </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Spara passet</button>
    </div>
  </div>
</form>
</div>

<?php include("inc/footer.php"); ?>