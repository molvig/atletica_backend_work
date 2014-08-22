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

	   	if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
	   		else {$nyckelkort = 0;}


/*	

	   if ($korttyp == "AG"){$kortgiltigt = $kortgiltigt + nästa år}
	   if ($korttyp == "K"){$kortgiltigt = $kortgiltigt + 365dagar}
	   if ($korttyp == "KL"){$kortgiltigt = $kortgiltigt + 168 dagar}
	   if ($korttyp == "MD"){$kortgiltigt = $kortgiltigt + 30dagar}
	   if ($korttyp == "MK"){$kortgiltigt = $kortgiltigt + 30dagar}
	   if ($korttyp == "MS"){$kortgiltigt = $kortgiltigt + 30dagar}
	   if ($korttyp == "MU"){$kortgiltigt = $kortgiltigt + 30dagar}
	   if ($korttyp == "O"){$kortgiltigt = $kortgiltigt + ?????}
	   if ($korttyp == "S"){$kortgiltigt = $kortgiltigt + 365dagar}
	   if ($korttyp == "V1"){$kortgiltigt = $kortgiltigt + 7dagar}
	   if ($korttyp == "V2"){$kortgiltigt = $kortgiltigt + 14dagar}


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
			   $query = ("INSERT INTO medlemskort (kundnr, giltigt, kort, nyckelkort) VALUES (:kundnr, :kortgiltigt, :korttyp, :nyckelkort)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
			    					':kortgiltigt'=>$kortgiltigt,
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








