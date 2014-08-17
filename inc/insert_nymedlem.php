<?php
	 
	if(!empty($_POST)){
	    $personnr = $_POST['personnr'];
	   	$fnamn = $_POST['fnamn'];
	   	$enamn = $_POST['enamn'];
	   	$telefonnr = $_POST['phone'];
	   	$email = $_POST['mail'];
	   	$medlemsstart= $_POST['medlemsstart'];
	   	$anteckning = $_POST['note'];

		try {
			 $query = ("INSERT INTO medlemmar (kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, medlemsstart) VALUES (:kundnr, :personnr, :fnamn, :enamn, :phone, :mail, :note, :medlemsstart)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':kundnr'=>$biggestkundnr,
			    					':personnr'=>$personnr,
			    					':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':phone'=>$telefonnr,
			    					':mail'=>$email,
			    					':note'=>$anteckning,
			    					':medlemsstart'=>$medlemsstart,


			    					));

		  		if($query){ ?>
		    	<div class="grid_12"> <?php echo  '<h4>' . 'Du har lagt till en ny medlem!' . '</h4>'; ?> </div>
			 <?php	}
		} 
		catch (Exception $e) {?>

			<div class="grid_12"> <?php echo '<h4>' . 'Oj, det har blivit något fel...' . '</h4>';?> </div>
		<?php }
			   

	}
	?>





