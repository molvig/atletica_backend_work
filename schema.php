<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/schema_date.php"); ?>
  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">
<center><h3>Schema 2014</h3></center>

<!-- Växlar mellan veckorna-->
<ul class="pager">
  <li class="previous disabled"><a href="#">&larr; Föregående vecka</a></li>
  <li class="next"><a href="schema.php">Nästa vecka &rarr;</a></li>

  <button type="submit" class="btn btn-default" id="test" onclick="addweek()">Nästa vecka &rarr;</button>
            
</ul>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Måndag <span id="mon"> <?php echo $mon; ?> </span>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Tisdag <?php echo $tue; ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Onsdag <?php echo $wed;?>
		    </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Torsdag <?php echo $thu;?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Fredag <?php echo $fri;?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <?php echo $sat;?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <?php echo $sun;?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

  <script> 

 	function addweek(){
  	var oldDate = document.getElementById("mon");
    var myDate = new Date();
    myDate.setDate(myDate.getDate()+7);
    return myDate;
		}

	document.getElementById("mon").innerHTML = myDate;

    </script> 



<?php include("inc/footer.php"); ?>