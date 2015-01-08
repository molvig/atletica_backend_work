

    <?php  
     $id_medlem = $_GET['pid'];
	 $kundnr ="";
	 $personnr ="";
	 $fnamn ="";
	 $enamn ="";
	 $telefon="";
	 $mail ="";
	 $kortdatum="";
	 $anteckning ="";
	 $meddelande="";
	 $medlemsstart="";
	 $passantal="";
	 $kortID="";
	 $kortet="";
	 $korttyp="";
	 $giltigtfran="";
	 $giltigttill="";
	 $kortgiltigt="";
	 $korttypen="";
	 $fryst="";
	 $frysdagar="";
	 $frysdatum="";
	 $nyckelkort="";
	 $aktivtkortID="";
	 $status="";
	 $kortstatus="";
	 $ag_aktivt="";
	 $antalklipp="";

	 

	try {
					$query = ("SELECT * FROM medlemmar WHERE kundnr ={$id_medlem}");
					$stmt = $db ->prepare($query);
					$stmt->execute();
					}
					catch (Exception $e) {
					echo "Data could not be retrieved from the database";
					exit;
					}
					$member = $stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach($member as $m){
						$kundnr .= $m['kundnr'];
						$personnr .= $m['personnr'];
						$fnamn .= $m['fnamn'];
						$enamn .= $m['enamn'];
						$telefon .= $m['telefon'];
						$mail .= $m['mail'];
						$anteckning .= $m['anteckning'];
						$medlemsstart .= $m['medlemsstart'];
						$passantal.= $m['passantal'];
						$nyckelkort .= $m['nyckelkort'];
					}
					
					$stmt->closeCursor(); 



	 try {
	 		$today = date("Y-m-d"); 
			$query = ("SELECT * FROM medlemskort WHERE kundnr ={$kundnr} AND aktivtkort=1"); 
			$stmt = $db ->prepare($query);
			$stmt->execute();
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}
	$kort= $stmt->fetchAll(PDO::FETCH_ASSOC); 
	$stmt->closeCursor(); 
	
          foreach($kort as $k){

          		$kortet = $k['kort'];

          		$query = ("SELECT * FROM korttyp WHERE kort = '{$kortet}'");
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$kortets = $stmt->fetch(PDO::FETCH_ASSOC); 
				$korttypen = $kortets['korttyp']; 
				$stmt->closeCursor(); 

				$aktivtkortID = $k['kortID'];
				
				$giltigtfran = $k['giltigtfran'];
				$giltigttill = $k['giltigttill'];
				if ($giltigttill ==null && $kortet=="10"){
					$kortgiltigt="Inga klipp gjorda";
				}else if ($giltigttill ==null && $kortet=="INST"){
					$kortgiltigt=""; }
				else {
					$kortgiltigt= date('Y-m-d', strtotime($giltigttill));
				}
				$fryst = $k['fryst'];
				$frysdatum = $k['frysdatum'];
				$frysdagar = $k['frysdagar'];
				$antalklipp = $k['antalklipp'];


					if ($kortet == "10" ) {
					 	$kortID = $k['kortID'];
					 	$today = date('Y-m-d');
					 	$antalklipp = $k['antalklipp'];

					 	if ($giltigttill == null || $giltigttill >= $today){
					 		$klippantal = $antalklipp;

						}else if ($giltigttill < $today){
							if ($antalklipp>10){
								$firstklipp = date('Y-m-d', strtotime($giltigttill. "-6 months")); 
								$query = "SELECT * FROM klipplogg WHERE kortID ={$kortID} AND klipptid <= '$giltigttill' AND klipptid >= '$firstklipp' ";
								$stmt = $db ->prepare($query);
								$stmt->execute();	
								$totalklipp = $stmt->rowCount();
								$raderaklipp = 10 - $totalklipp;
								$klippantal = $antalklipp - $raderaklipp;
								$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$kundnr} AND aktivtkort=1");
								$q = $db -> prepare($query);
								$q-> execute(array(':antalklipp'=>$klippantal, ':giltigttill'=>null));
							} else {
								$klippantal = 0;
								$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$kundnr} AND aktivtkort=1");
								$q = $db -> prepare($query);
								$q-> execute(array(':antalklipp'=>0, ':giltigttill'=>null));
							}
						}

					}
				
             }




 try {
			$query = ("SELECT * FROM medlemskort WHERE kundnr ={$kundnr} ORDER BY kortID DESC");
			$stmt = $db ->prepare($query);
			$stmt->execute();

			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$allakort="";
			$today = date("Y-m-d"); 
			$stmt->closeCursor(); 


           foreach($rows as $row){
           
				$ag_aktivt=$row['ag_aktivt'];
				$korttyp = $row['kort'];

	           	$query = ("SELECT * FROM korttyp WHERE kort = '{$korttyp}'");
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$kortet = $stmt->fetch(PDO::FETCH_ASSOC); 
				$korts = $kortet['korttyp']; 
				$stmt->closeCursor(); 



				if ($row['aktivtkort'] == 1 && $row['giltigtfran']<=$today || $ag_aktivt==1) 
						{$kortstatus = "Aktivt";}

				else if ($row['aktivtkort'] == 0 && $row['giltigttill']>=$today || $ag_aktivt==1) 
						{$kortstatus = "Aktivt";}

				else if ($row['aktivtkort'] == 1 && $row['giltigtfran']>$today) 
						{$kortstatus = "Ej börjat gälla";}


				else if ($row['aktivtkort'] == 0 || $row['giltigttill']<$today || $ag_aktivt==0) 
						{$kortstatus = "Ej aktivt";}

				if($ag_aktivt==0){		
				$allakort.= "<tr>" . "<td>" . $row['kortID'] . "</td>" . "<td>"  . $korts  . "</td>" . "<td>" . $row["giltigtfran"] .  "</td>" . "<td>"  . $row["giltigttill"] . "</td>" . "<td>"  . $kortstatus .  "</td>". "</tr>" ;
	 			}

	 			else if($ag_aktivt==1) 
	 				{		
				$allakort.= "<tr>" . "<td>" . $row['kortID'] . "</td>" . "<td>"  . $korts . "</td>" . "<td>" . $row["giltigtfran"] .  "</td>" . "<td>"  . "Autogiro" . "</td>" . "<td>"  . $kortstatus .  "</td>". "</tr>" ;
	 			}
	 			$stmt->closeCursor(); 
 			}

	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}
	

	if($giltigttill==null && $korttyp!="10"){$giltigttill="no";}
	if($giltigttill==null && $korttyp=="10"){$giltigttill="not";}

	else {$giltigttill = date ('Y-m-d', strtotime($giltigttill));}	
	

	if($fryst==1){$daysleft="Fryst";}
	else if ($giltigtfran > $today){$daysleft="Ej börjat gälla";}
	else if ($korttyp=="INST"){$daysleft="Instruktör";}
	else if (($korttyp=="AG12" || $korttyp=="AG12+2" || $korttyp=="AG24" || $korttyp=="AG24+2" || $korttyp=="AG12DAG") && $ag_aktivt ==1){ $daysleft="Autogiro";} 
	else if ($giltigttill == "no"){$daysleft="Har inget kort";}
	else if ($giltigttill == "not"){$daysleft="Inga klipp gjorda";}
	else {$daysleft = ((strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400) . " dagar kvar"; }




      $today = date("Y-m-d"); 
      $nyttdatum = "";

    if(($giltigttill!="no") && ($giltigttill!="not")) {
			if ($giltigttill >= $today){
			  $nyttdatum = date('Y-m-d', strtotime($giltigttill. ' + 1 day')); 

			}

			else {
			   $nyttdatum = $today;

			}

	}
	else {
	   $nyttdatum = $today;

	}
	
	$query = "SELECT * FROM skulder WHERE kundnr = {$kundnr} ";
	$stmt = $db ->prepare($query);
	$stmt->execute();
	$skuld=$stmt->rowCount(); 
	$stmt->closeCursor();
	$skulden="";
	if($skuld>0){
	
	$skulden = '<a style="text-decoration:none;"' .'href="medlem_skuldlista.php?member=' .$kundnr ."&submit-skuld=" .'">'. '<div class="alert alert-danger">' . '<span class="glyphicon glyphicon-exclamation-sign"></span> Denna medlem har skulder! Klicka för att se dessa.</div></a>';

	}


?>


