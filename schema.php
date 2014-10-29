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


	<a href="schema.php?schemaid=<?=$schemaID;?>&date=<?=$next_date;?>"><button style="float:right;" type="submit" class="btn btn-default">Nästa vecka &rarr;</button></a>
	<a href="schema.php?schemaid=<?=$schemaID;?>&date=<?=$prev_date;?>"><button style="float:left;" type="submit" class="btn btn-default">&larr; Föregående vecka</button></a>

  
</div>
<form method="get">



<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Måndag <?php echo $mandag; ?>
		     </p> 
		      <?php echo $mon; ?>
		    <a href="schema_extra_pass.php?dagid=1" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Tisdag <?php echo $tisdag; ?>
		  </p>
		  <?php echo $tue; ?>
		  <a href="schema_extra_pass.php?dagid=2" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Onsdag <?php echo $onsdag; ?>
		    </p>
		    <?php echo $wed; ?>
		  <a href="schema_extra_pass.php?dagid=3" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Torsdag <?php echo $torsdag; ?>
		  </p>
		  <?php echo $thu; ?>
		  <a href="schema_extra_pass.php?dagid=4" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Fredag <?php echo $fredag; ?>
		  </p>
		  <?php echo $fri; ?>
		  <a href="schema_extra_pass.php?dagid=5" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <?php echo $lordag; ?>
		  </p>
		  <?php echo $sat; ?>
		  <a href="schema_extra_pass.php?dagid=6" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <?php echo $sondag; ?>
		  </p>
		  <?php echo $sun; ?>
		  <a href="schema_extra_pass.php?dagid=7" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>


</form>




<?php include("inc/footer.php"); ?>