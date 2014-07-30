<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>

<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_3">
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyinst">Lägg till en ny instruktör</label>
    <input type="text" class="form-control" id="nyinst" name="nyinst" placeholder="Namn på instruktören">
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
</form>
</div>

<div class="grid_2">

	
</div>
<div class="grid_4">
<h4>Instruktörer som finns sparade:</h4>	
<?php echo $instnamnet ?>
</div>

<?php
	 
	if(!empty($_POST)){
	    $nyinst = $_POST['nyinst'];
		try {
			 $query = ("INSERT INTO instruktorer (instnamn) VALUES (:nyinst)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':nyinst'=>$nyinst));

		  		if($query){?>
		    	<div class="grid_12"> <?php echo '<h4>' . 'Du har lagt till '. '<strong>' . $nyinst  .'</strong>' .' som en ny instruktör!' . '</h4>'; ?></div>
			 <?php	}
		} 
		catch (Exception $e) { ?>

			<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Instruktören du försöker lägga till finns redan...' . '</h4>'; ?> </div>
		<?php }
			   

	}
?>


<?php include("inc/footer.php"); ?>