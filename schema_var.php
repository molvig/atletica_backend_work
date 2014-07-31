<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">
<center><h3>Vårschema 2015</h3></center>

<!-- Växlar mellan veckorna-->
<ul class="pager">
  <li class="previous disabled"><a href="#">&larr; Föregående vecka</a></li>
  <li class="next"><a href="schema_host_nextweek.php">Nästa vecka &rarr;</a></li>
</ul>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Måndag <?php ?>
		  </a>
		  <a href="schema_uppdatera_pass.php" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Tisdag <?php ?>
		  </a>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Onsdag <?php ?>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Torsdag <?php ?>
		  </a>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Fredag <?php ?>
		  </a>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Lördag <?php ?>
		  </a>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Söndag <?php ?>
		  </a>
		  <a href="#" class="list-group-item">8.30 Zumba</a>

	</div>
</div>




<?php include("inc/footer.php"); ?>