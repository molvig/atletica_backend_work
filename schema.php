<?php include("inc/db_con.php"); ?>
<?php include("inc/get_pass_schema_bokningsbar.php"); ?>
<?php include("inc/date.php"); ?>


<?php $_SESSION['schemaID'] = $schemaID ; ?>



<?php include("inc/header.php"); ?>

  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">


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


            <?php



$today = date('Y-m-d');
$date = new DateTime($today);
$week = $date->format("W");


$week = isset($_GET['date']) ? $_GET['date'] : date('W');



$prev_week = $week - 1;
$next_week = $week + 1;
?>


<!-- Växlar mellan veckorna-->
<div class="pager">

	<a href="?date=<?=$next_week;?>"><button style="float:right;" type="submit" class="btn btn-default">Nästa vecka &rarr;</button></a>
	<a href="?date=<?=$prev_week;?>"><button style="float:left;" type="submit" class="btn btn-default">&larr; Föregående vecka</button></a>

  
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
		  <a href="schema_extra_pass.php?dagid=3" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Torsdag <?php echo $torsdag; ?>
		  </p>
		  <a href="schema_extra_pass.php?dagid=4" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		   Fredag <?php echo $fredag; ?>
		  </p>
		  <a href="schema_extra_pass.php?dagid=5" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <?php echo $lordag; ?>
		  </p>
		  <a href="schema_extra_pass.php?dagid=6" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <?php echo $sondag; ?>
		  </p>
		  <a href="schema_extra_pass.php?dagid=7" class="list-group-item">Lägg till extra pass</a>
	</div>
</div>

<?php include("inc/next_week.php"); ?>

</form>




<?php include("inc/footer.php"); ?>