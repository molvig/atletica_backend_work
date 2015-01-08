<?php
	 $today = date('Y-m-d');
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
	   							$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 425 days'));
	   							$ag_aktivt=1;  }

	   if ($korttyp == "AG12DAG"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
								$ag_aktivt=1; }

	   if ($korttyp == "AG24"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 730 days')); 
								$ag_aktivt=1; }

		if ($korttyp == "AG24+2"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 790 days'));
   								$bindningsdatum = date('Y-m-d', strtotime($kortgiltigtfran. ' + 790 days')); 
								$ag_aktivt=1; }


	   if ($korttyp == "H"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); 
	   							$bindningsdatum = null ;
	   							$ag_aktivt=0;}
	   							$antalklipp = null;
	   if ($korttyp == "HS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 183 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "MD"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
			   					$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "MK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "MS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "MU"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 30 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "YK"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "YS"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days'));
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}
	   if ($korttyp == "YSTUDENT"){$giltigttill = date('Y-m-d', strtotime($kortgiltigtfran. ' + 365 days')); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}

		if ($korttyp == "SPECIAL"){$giltigttill = date('Y-m-d', strtotime($giltigttillspecial)); 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;}

		if($kortgiltigtfran >= $today) {$aktivtkort=1;}
		else {$aktivtkort=0;}

		if ($korttyp == "INST"){$giltigttill = null; 
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$antalklipp = null;
	   							$aktivtkort=1;}



		if ($korttyp == "10"){ $antalklipp = 10 * $kortantal;
								$giltigttill = null; 
								$kortgiltigtfran = null;
		   						$bindningsdatum = null ;
	   							$ag_aktivt=0;
	   							$aktivtkort=1;}





if (($kortgiltigtfran >= $today) && ($giltigttill >= $kortgiltigtfran) ||($giltigttill==null) ) { 
		try {
			$db->beginTransaction();
			 $query = ("INSERT INTO medlemmar (kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, nyckelkort, medlemsstart) VALUES (:kundnr, :personnr, :fnamn, :enamn, :phone, :mail, :note, :nyckelkort, :start)");
			    $q = $db -> prepare($query);
			    $q -> execute(array(':kundnr'=>$biggestkundnr,
			    					':personnr'=>$personnr,
			    					':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':phone'=>$telefonnr,
			    					':mail'=>$email,
			    					':note'=>$anteckning,
			    					':nyckelkort'=>$nyckelkort,
			    					':start'=>$today

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

       else {    echo $kortgiltigtfran. " >= ".$today. " && " . $giltigttill. " >= ". $kortgiltigtfran; ?>

        <div class="alert alert-danger" role="alert"><span><p>Det gick <u>INTE</u> att lägga till en ny medlem eftersom startdatumet för kortet ligger tidigare än dagens datum.</p></span></div>
        
      <?php }
	
} ?>