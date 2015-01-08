<?php

  if(!empty($_POST)){


	$kundnr ="";
	$fnamn ="";
	$enamn ="";

	if(isset($_POST["klipp-submit"]))
	{	$passid = htmlspecialchars($_GET["passid"]);
			$id_medlem = $_POST["getkundnrut"];
			try {
					$query = ("SELECT * FROM medlemmar WHERE kundnr ={$id_medlem}");
					$stmt = $db ->prepare($query);
					$stmt->execute();
			}

			catch (Exception $e) {
					echo "Data could not be retrieved from the database";
					echo $e;
					exit;
			}
					
			$member = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor(); 

			$fnamn = $member['fnamn']; 
			$enamn = $member['enamn']; 
			

				foreach($member as $m){
						try {
								$query = ("SELECT * FROM medlemskort WHERE kundnr ={$member['kundnr']} AND aktivtkort=1");
								$stmt = $db ->prepare($query);
								$stmt->execute();
						}

						catch (Exception $e) {
								echo "Data could not be retrieved from the database";
								echo $e;
								exit;
						}
								
						$membercard = $stmt->fetch(PDO::FETCH_ASSOC);
						$stmt->closeCursor(); 
					}


			if ($membercard['kort'] == "10" ) {

					 	$kortID = $membercard['kortID'];
					 	$today = date('Y-m-d');
					 	$kortgiltigttill = $membercard['giltigttill'];
					 	$oldklippantal = $membercard['antalklipp'];


					 	if ($kortgiltigttill == null || $kortgiltigttill >= $today){
					 			$klippantal = $oldklippantal - 1;



								if ($oldklippantal=="10" || $oldklippantal=="20" || $oldklippantal=="30" || $oldklippantal=="40" || $oldklippantal=="50"){

									$giltigttill = date('Y-m-d', strtotime($today. "+6 months"));
									
									$query = ("INSERT INTO klipplogg (kortID, pass, bokningsbarID) VALUES (:kortID, :pass, :bokningsbarID)");
					  				$q = $db -> prepare($query);
					    			$q-> execute(array(':kortID'=>$kortID,
					    								':pass'=>1,
					    								':bokningsbarID'=>$passid
					    				));

								 	$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$member['kundnr']} AND aktivtkort=1");
			         				$q = $db -> prepare($query);
			         				$q-> execute(array(':antalklipp'=>$klippantal,
			         									'giltigttill'=>$giltigttill));

								 	//$klipp = '<script> alert("' .$fnamn. ' ' .$enamn. ' och hon har nu ' . $klippantal . ' klipp kvar som måste förbrukas innan '. $giltigttill. '");</script>';

									echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 

								}


								else{
									$today=date('Y-m-d H:i:s');
									$query = ("INSERT INTO klipplogg (kortID, klipptid, pass, bokningsbarID) VALUES (:kortID, :klipptid, :pass, :bokningsbarID)");
					  				$q = $db -> prepare($query);
					    			$q-> execute(array(':kortID'=>$kortID,
					    								':klipptid'=>$today,
					    								':pass'=>1,
					    								':bokningsbarID'=>$passid
					    				));


								 	$query = ("UPDATE medlemskort SET antalklipp=:antalklipp WHERE kundnr={$member['kundnr']} AND aktivtkort=1");
			         				$q = $db -> prepare($query);
			         				$q-> execute(array(':antalklipp'=>$klippantal));

								 	//$klipp = '<script> alert("' .$fnamn. ' ' .$enamn. ' och hon har nu ' . $klippantal . ' klipp kvar som måste förbrukas innan '. $kortgiltigttill. '");</script>';

									
									echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
								}


						}	

/*
						else if ($kortgiltigttill < $today){

								if ($oldklippantal>10){

								  $firstklipp = date('Y-m-d', strtotime($kortgiltigttill. "-6 months")); 

									$query = "SELECT * FROM klipplogg WHERE kortID ={$kortID} AND klipptid <= '$kortgiltigttill' AND klipptid >= '$firstklipp' ";
									$stmt = $db ->prepare($query);
									$stmt->execute();	

									$totalklipp = $stmt->rowCount();
									$raderaklipp = 10 - $totalklipp;
									$nyaklipp = $oldklippantal - $raderaklipp;


									$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$member['kundnr']} AND aktivtkort=1");
				         			$q = $db -> prepare($query);
				         			$q-> execute(array(':antalklipp'=>$nyaklipp, ':giltigttill'=>null));



								} 

								else {
										$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$member['kundnr']} AND aktivtkort=1");
				         				$q = $db -> prepare($query);
				         				$q-> execute(array(':antalklipp'=>0, ':giltigttill'=>null));

								}
						}

*/


					 		
			 }




			 else {

			 	echo "Medlemmen har inget klippkort?!";
			 }



	}



}





	?>





