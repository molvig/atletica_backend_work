<?php include("inc/db_con.php"); ?>
<?php include("inc/get_pass_schema.php"); ?>
<?php include("inc/update_pass_orginalschema.php"); ?>
<?php $_SESSION['schemaID'] = $schemaID ; ?>



<?php include("inc/header.php"); ?>


  <div class="grid_2">
   <?php include("inc/menyinst_original.php"); ?>
  </div>

<div class="grid_10">
	<?php echo $schemaID; ?>

<center><h3><?php if ($schemaID == 'schemaid=1'){ 

            echo "Vårschema";

            }?>

            <?php if ($schemaID == 'schemaid=2'){ 

            echo "Sommarschema";

            }?>

            <?php if ($schemaID == 'schemaid=3'){ 

            echo "Höstschema";

            }?>

            <?php if ($schemaID == 'schemaid=4'){ 

            echo "Vinterschema";

            }?></h3></center>

<div class="grid_1a">
	<div class="list-group" name="1">
		  <a href="#" class="list-group-item active">
		    Måndag
		  </a>	
			<?php echo $mon; ?>
		  <a href="schema_nytt_original_pass.php?dagid=1" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group" namne="2">
		  <a href="#" class="list-group-item active">
		    Tisdag
		  </a>
		  <?php echo $tue; ?>
		  <a href="schema_nytt_original_pass.php?dagid=2" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Onsdag
		  </a>
		  <?php echo $wed; ?>
		  <a href="schema_nytt_original_pass.php?dagid=3" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Torsdag
		  </a>
		  <?php echo $thu; ?>
		  <a href="schema_nytt_original_pass.php?dagid=4" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Fredag
		  </a>
		  <?php echo $fri; ?>
		  <a href="schema_nytt_original_pass.php?dagid=5" class="list-group-item">Lägg till nytt pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Lördag
		  </a>
		  <?php echo $sat; ?>
		  <a href="schema_nytt_original_pass.php?dagid=6" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Söndag
		  </a>
		  <?php echo $sun; ?>
		  <a href="schema_nytt_original_pass.php?dagid=7" class="list-group-item">Lägg till nytt pass</a>

	</div>
</div>

<?php include("inc/footer.php"); ?>