<?php
	 
	if(!empty($_POST)){
	    $personnr = $_POST['personnr'];
	   	$fnamn = $_POST['fnamn'];
	   	$enamn = $_POST['enamn'];
	   	$telefonnr = $_POST['phone'];
	   	$email = $_POST['mail'];
	   	$kortgiltigtfran = $_POST['kortgiltigtfran'];
	   
	   	$anteckning = $_POST['note'];
	   	$korttyp = $_POST['korttyp'];

	   	if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
	   		else {$nyckelkort = 0;}

	
		



	   if ($korttyp == "AG12"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));  }
	   if ($korttyp == "AG12DAG"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); }
	   if ($korttyp == "AG24"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days')); }
	   if ($korttyp == "H"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); }
	   if ($korttyp == "HS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); }
	   if ($korttyp == "MD"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); }
	   if ($korttyp == "MK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); }
	   if ($korttyp == "MS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); }
	   if ($korttyp == "MU"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); }
	   if ($korttyp == "YK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); }
	   if ($korttyp == "YS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); }
	   if ($korttyp == "YSTUDENT"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); }

/*		if ($korttyp == "SPECIAL"){$giltigttill = date('Y-m-d', strtotime($kortgiltigt. ' + 2 days')); }


	   if ($korttyp == "10"){$giltigttill = date('Y-m-d', strtotime($kortgiltigt. ' + 2 days')); }
*/

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
			   $query = ("INSERT INTO medlemskort (kundnr, giltigtfran, giltigttill, kort, nyckelkort) VALUES (:kundnr, :kortgiltigtfran, :kortgiltigttill, :korttyp, :nyckelkort)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
									':kortgiltigtfran'=>$kortgiltigtfran,
			    					':kortgiltigttill'=>$giltigttill,
			    					':korttyp'=>$korttyp,
			    					':nyckelkort'=>$nyckelkort

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








