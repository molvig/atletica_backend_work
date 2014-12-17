<?php

  if(!empty($_POST))
{


	$kundnr ="";
	$fnamn ="";
	$enamn ="";
	$korttyp="";

	if(isset($_POST["klipp-kort"]))
	{
			$id_medlem = $_POST["medlemsnummer_klippkort"];
			try {
					$query = ("SELECT * FROM medlemmar WHERE kundnr ={$id_medlem}");
					$stmt = $db ->prepare($query);
					$stmt->execute();
					$member = $stmt->fetch(PDO::FETCH_ASSOC);
					$stmt->closeCursor(); 
			}

			catch (Exception $e) {
					echo "Data could not be retrieved from the database 1";
					exit;
			}
					


			$fnamn = $member['fnamn']; 
			$enamn = $member['enamn']; 
			$kundnr = $member['kundnr']; 

				foreach($member as $m){
						try {
								$query = ("SELECT * FROM medlemskort WHERE kundnr ={$kundnr} AND aktivtkort=1");
								$stmt = $db ->prepare($query);
								$stmt->execute();
								$membercard = $stmt->fetch(PDO::FETCH_ASSOC);
								$stmt->closeCursor(); 
						}

						catch (Exception $e) {
								echo "Data could not be retrieved from the database 2";
								exit;
						}
						$korttyp=$membercard['kort'];		

					}


			if ($korttyp == "10" ) {

					 	$kortID = $membercard['kortID'];
					 	$today = date('Y-m-d');
					 	$kortgiltigttill = $membercard['giltigttill'];
					 	$oldklippantal = $membercard['antalklipp'];



					 	if ($kortgiltigttill == null || $kortgiltigttill >= $today){
					 			$klippantal = $oldklippantal - 1;


								if ($oldklippantal=="10" || $oldklippantal=="20" || $oldklippantal=="30" || $oldklippantal=="40" || $oldklippantal=="50"){

									$giltigttill = date('Y-m-d', strtotime($today. "+6 months"));
									
									$query = ("INSERT INTO klipplogg (kortID, gym) VALUES (:kortID, :gym)");
					  				$q = $db -> prepare($query);
					    			$q-> execute(array(':kortID'=>$kortID, ':gym'=>1));

								 	$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$kundnr} AND aktivtkort=1");
			         				$q = $db -> prepare($query);
			         				$q-> execute(array(':antalklipp'=>$klippantal,
			         									'giltigttill'=>$giltigttill));

								 	$klipp = '<script> alert("' .$fnamn. ' ' .$enamn. ' och hon har nu ' . $klippantal . ' klipp kvar som måste förbrukas innan '. $giltigttill. '");</script>';

									echo $klipp;

								}


								else{
									$query = ("INSERT INTO klipplogg (kortID, gym) VALUES (:kortID, :gym)");
					  				$q = $db -> prepare($query);
					    			$q-> execute(array(':kortID'=>$kortID, ':gym'=>1));


								 	$query = ("UPDATE medlemskort SET antalklipp=:antalklipp WHERE kundnr={$kundnr} AND aktivtkort=1");
			         				$q = $db -> prepare($query);
			         				$q-> execute(array(':antalklipp'=>$klippantal));

								 	$klipp = '<script> alert("' .$fnamn. ' ' .$enamn. ' och hon har nu ' . $klippantal . ' klipp kvar som måste förbrukas innan '. $kortgiltigttill. '");</script>';

									echo $klipp;
								}


						}	


						else if ($kortgiltigttill < $today){

								if ($oldklippantal>10){

								  $firstklipp = date('Y-m-d', strtotime($kortgiltigttill. "-6 months")); 

									$query = "SELECT * FROM klipplogg WHERE kortID ={$kortID} AND klipptid <= '$kortgiltigttill' AND klipptid >= '$firstklipp' ";
									$stmt = $db ->prepare($query);
									$stmt->execute();	

									$totalklipp = $stmt->rowCount();
									$raderaklipp = 10 - $totalklipp;
									$nyaklipp = $oldklippantal - $raderaklipp;


									$query = ("UPDATE medlemskort SET antalklipp=:antalklipp WHERE kundnr={$kundnr} AND aktivtkort=1");
				         			$q = $db -> prepare($query);
				         			$q-> execute(array(':antalklipp'=>$nyaklipp));



								} 

								else {
										$query = ("UPDATE medlemskort SET antalklipp=:antalklipp WHERE kundnr={$kundnr} AND aktivtkort=1");
				         				$q = $db -> prepare($query);
				         				$q-> execute(array(':antalklipp'=>0));

								}
						}




					 		
			 }




			 else {

			 	echo "Medlem ". $id_medlem. " har inget klippkort. Försök igen!";
			 }



	}
}








	?>




