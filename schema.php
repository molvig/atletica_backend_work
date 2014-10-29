<?php include("inc/db_con.php"); ?>
<?php include("inc/date.php"); ?>
<?php include("inc/get_pass_schema_bokningsbar.php"); ?>
<?php $schemaID =  htmlspecialchars($_GET["schemaid"]) ;?>
<?php include("inc/header.php"); ?>

  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">


<center><?php if ($schemaID == "1"){ 

            echo "<h3>". "Vårschema". "</h3>". "<h4>". $startdatum. " - ".$slutdatum. "</h4>" ;

            }?>

            <?php if ($schemaID == "2"){ 

            echo "<h3>". "Sommarschema". "</h3>". "<h4>". $startdatum. " - ".$slutdatum. "</h4>" ;

            }?>

            <?php if ($schemaID == "3"){ 

            echo "<h3>". "Höstschema". "</h3>". "<h4>". $startdatum. " - ".$slutdatum. "</h4>" ;

            }?>

            <?php if ($schemaID == "4"){ 

            echo "<h3>". "Vinterschema". "</h3>". "<h4>". $startdatum. " - ".$slutdatum. "</h4>" ;

            }?></center>



<!-- Växlar mellan veckorna-->
<div class="pager">


	<a href="schema.php?schemaid=<?=$schemaID;?>&date=<?=$next_date;?>"><button style="float:right;" type="submit" class="btn btn-default" <?php echo $next_able ;?> >Nästa vecka &rarr;</button></a>
	<a href="schema.php?schemaid=<?=$schemaID;?>&date=<?=$prev_date;?>"><button style="float:left;" type="submit" class="btn btn-default"  <?php echo $prev_able ;?> >&larr; Föregående vecka</button></a>

  
</div>




<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Måndag <?php echo $mandag; ?>
		     </p> 
		      <?php echo $mon; ?>
		    <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=1&date=<?php echo $mandag;?>" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Tisdag <?php echo $tisdag; ?>
		  </p>
		  <?php echo $tue; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=2&date=<?php echo $tisdag;?>" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Onsdag <?php echo $onsdag; ?>
		    </p>
		    <?php echo $wed; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=3&date=<?php echo $onsdag;?>" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Torsdag <?php echo $torsdag; ?>
		  </p>
		  <?php echo $thu; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=4&date=<?php echo $torsdag;?>" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Fredag <?php echo $fredag; ?>
		  </p>
		  <?php echo $fri; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=5&date=<?php echo $fredag;?>" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <?php echo $lordag; ?>
		  </p>
		  <?php echo $sat; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=6&date=<?php echo $lordag;?>" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <?php echo $sondag; ?>
		  </p>
		  <?php echo $sun; ?>
		  <a href="schema_extra_pass.php?schemaid=<?php echo $schemaID;?>&dagid=7&date=<?php echo $sondag;?>" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>







<?php include("inc/footer.php"); ?>