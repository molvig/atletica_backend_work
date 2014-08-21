<?php
	 
	if(!empty($_POST)){
	    $personnr = $_POST['personnr'];
	   	$fnamn = $_POST['fnamn'];
	   	$enamn = $_POST['enamn'];
	   	$telefonnr = $_POST['phone'];
	   	$email = $_POST['mail'];
	   	$kortgiltigt= $_POST['kortgiltigt'];
	   	$anteckning = $_POST['note'];
	   	$korttyp = $_POST['korttyp'];



		try {
			$db->beginTransaction();
			 $query = ("INSERT INTO medlemmar (kundnr, personnr, fnamn, enamn, telefon, mail, anteckning) VALUES (:kundnr, :personnr, :fnamn, :enamn, :phone, :mail, :note)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
			    					':personnr'=>$personnr,
			    					':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':phone'=>$telefonnr,
			    					':mail'=>$email,
			    					':note'=>$anteckning

			    					));
			   $query = ("INSERT INTO medlemskort (kundnr, giltigt, kort) VALUES (:kundnr, :kortgiltigt, :korttyp)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
			    					':kortgiltigt'=>$kortgiltigt,
			    					':korttyp'=>$korttyp

			    					));
			    $db->commit();

		  		if($query){ ?>
		    	<div class="grid_12"> <?php echo  '<h4>' . 'Du har lagt till en ny medlem!' . '</h4>'; ?> </div>
			 <?php	}
		} 
		catch (Exception $e) {
			$db->rollBack();?>
			<?php echo $e; ?>
			<div class="grid_12"> <?php echo '<h4>' . 'Oj, det har blivit något fel...' . '</h4>';?> </div>
		<?php }
			   

	}
	?>








