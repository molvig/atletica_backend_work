<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/schema_date.php"); ?>
  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">
<center><h3>Schema 2014</h3></center>

<!-- Växlar mellan veckorna-->
<ul class="pager">
  <li class="previous"><a href="schema.php">&larr; Föregående vecka</a></li>
  <li class="next"><a href="#">Nästa vecka &rarr;</a></li>
</ul>
<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Måndag <?php echo $nextmon; ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Tisdag <?php ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Onsdag <?php ?>
		    </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Torsdag <?php ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Fredag <?php ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <?php ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <?php ?>
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

		 
		  
		 

<?php include("inc/footer.php"); ?>