<?php
	 
	if(!empty($_POST)){
	    $personnr = $_POST['personnr'];
	   	$fnamn = $_POST['fnamn'];
	   	$enamn = $_POST['enamn'];
	   	$telefonnr = $_POST['phone'];
	   	$email = $_POST['mail'];
	   	$kortgiltigtfran = $_POST['kortgiltigtfran'];
	   	$giltigttillspecial = $_POST['kortgiltigttill'];
	   	$anteckning = $_POST['note'];
	   	$korttyp = $_POST['korttyp'];
	   	$today = date("Y-m-d"); 
	   	$kortantal = $_POST['kortantal']; 


	   	if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
	   		else {$nyckelkort = 0;}

	

	   if ($korttyp == "AG12"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
	   							$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
	   							$ag_aktivt=1;  }
	   if ($korttyp == "AG12+2"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 425 days'));
	   							$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
	   							$ag_aktivt=1;  }

	   if ($korttyp == "AG12DAG"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
								$ag_aktivt=1; }

	   if ($korttyp == "AG24"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days')); 
								$ag_aktivt=1; }

		if ($korttyp == "AG24+2"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 790 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days')); 
								$ag_aktivt=1; }


	   if ($korttyp == "H"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); 
	   							$bindningsdatum = null ;
	   							$ag_aktivt=0;}
	   							$antalklipp = 0;
	   if ($korttyp == "HS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "MD"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
			   					$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "MK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "MS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "MU"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "YK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "YS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}
	   if ($korttyp == "YSTUDENT"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}

		if ($korttyp == "SPECIAL"){$giltigttill = date('Y-m-d', strtotime($giltigttillspecial)); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = 0;}

		if($kortgiltigtfran >= $today) {$aktivtkort=1;}
		else {$aktivtkort=0;}



		if ($korttyp == "10"){ $antalklipp = 10 * $kortantal;
								$giltigttill = null; 
								$kortgiltigtfran = null;
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$aktivtkort=1;}






		try {
			$db->beginTransaction();
			 $query = ("INSERT INTO medlemmar (kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, nyckelkort) VALUES (:kundnr, :personnr, :fnamn, :enamn, :phone, :mail, :note, :nyckelkort)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
			    					':personnr'=>$personnr,
			    					':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':phone'=>$telefonnr,
			    					':mail'=>$email,
			    					':note'=>$anteckning,
			    					':nyckelkort'=>$nyckelkort

			    					));
			   $query = ("INSERT INTO medlemskort (kundnr, giltigtfran, giltigttill, kort, aktivtkort, bindningsdatum, ag_aktivt, antalklipp) VALUES (:kundnr, :kortgiltigtfran, :kortgiltigttill, :korttyp, :aktivtkort, :bindningsdatum, :ag_aktivt, :antalklipp)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
									':kortgiltigtfran'=>$kortgiltigtfran,
			    					':kortgiltigttill'=>$giltigttill,
			    					':korttyp'=>$korttyp,
			    					':aktivtkort'=>$aktivtkort,
			    					':bindningsdatum'=>$bindningsdatum,
			    					':ag_aktivt'=>$ag_aktivt,
			    					':antalklipp'=>$antalklipp
			    					

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
