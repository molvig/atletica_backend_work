

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
	 $korttypen="";
	 $fryst="";
	 $frysdatum="";
	 $nyckelkort="";
	 $aktivtkort="";
	 $allakort="";
	 $status="";

	 


	 try {
			$results = $db -> query ("SELECT kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, meddelande, medlemsstart, passantal, nyckelkort  FROM medlemmar WHERE kundnr ={$id_medlem}");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$member = ($results -> fetchAll(PDO::FETCH_ASSOC));

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




	 try {
	 		$today = date("Y-m-d"); 
			$results = $db -> query ("SELECT kortID, kort, giltigtfran, giltigttill FROM medlemskort WHERE kundnr ={$kundnr} AND giltigtfran <= '{$today}' AND giltigttill >= '{$today}'"); 
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}
	$kort = ($results -> fetchAll(PDO::FETCH_ASSOC));
	
          foreach($kort as $k){

				$aktivtkort .= $k['kortID'];
				$kortet .= $k['kort'];
				$giltigtfran .= $k['giltigtfran'];
				$giltigttill .= $k['giltigttill'];
				
             }




 try {
			$results = $db -> query ("SELECT kortID, kort, giltigtfran, giltigttill FROM medlemskort WHERE kundnr ={$kundnr}");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}
	$rows = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$allakort="";
	$today = date("Y-m-d"); 

	if ($giltigtfran <= $today AND $giltigttill >= $today) {$status="Aktivt";}

	else{$status="Ej aktivt";}

           foreach($rows as $row){

					$allakort.= "<tr>" . "<td>" . $row['kortID'] . "</td>" . "<td>"  . $row["kort"] . "</td>" . "<td>" . $row["giltigtfran"] .  "</td>" . "<td>"  . $row["giltigttill"] . "</td>" . "<td>"  . $status .  "</td>". "</tr>" ;
 			}










$today = date("Y-m-d");  
$daysleft = (strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400; 
     



	 try {
			$results = $db -> query ("SELECT korttyp FROM korttyp WHERE kort = '{$kortet}'");
			
			while($korttyp = $results->fetch(PDO::FETCH_ASSOC))
				 {
				   $korttypen = ($korttyp['korttyp']);
				 }

	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}


?>


