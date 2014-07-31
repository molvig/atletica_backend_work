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
<?php include("getinstruktorer.php"); ?>