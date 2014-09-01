

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
	 $aktivtkortID="";
	 $status="";
	 $kortstatus="";
	 $ag_aktivt="";
	 $antalklipp="";

	 

	try {
					$query = ("SELECT kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, meddelande, medlemsstart, passantal, nyckelkort FROM medlemmar WHERE kundnr ={$id_medlem}");
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
			$query = ("SELECT kortID, kort, giltigtfran, giltigttill, fryst, frysdatum, antalklipp FROM medlemskort WHERE kundnr ={$kundnr} AND aktivtkort=1"); 
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

				$aktivtkortID .= $k['kortID'];
				$kortet .= $k['kort'];
				$giltigtfran .= $k['giltigtfran'];
				$giltigttill .= $k['giltigttill'];
				$fryst .= $k['fryst'];
				$frysdatum.= $k['frysdatum'];
				$antalklipp.= $k['antalklipp'];
				
             }




 try {
			$query = ("SELECT kortID, kort, giltigtfran, giltigttill, aktivtkort, ag_aktivt FROM medlemskort WHERE kundnr ={$kundnr} ORDER BY giltigttill DESC");
			$stmt = $db ->prepare($query);
			$stmt->execute();

			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$allakort="";
			$today = date("Y-m-d"); 
			$stmt->closeCursor(); 


           foreach($rows as $row){
           /*
	           	$query = ("SELECT korttyp FROM korttyp WHERE kort = {$row['kort']}");
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$kortet = $stmt->fetch(PDO::FETCH_ASSOC); 
				$korttyp = $kortet['korttyp']; 
			*/
				$ag_aktivt=$row['ag_aktivt'];
				$korttyp=$row['kort'];

				if ($row['aktivtkort'] == 1 && $row['giltigtfran']<=$today || $ag_aktivt==1) 
						{$kortstatus = "Aktivt";}

				else if ($row['aktivtkort'] == 1 && $row['giltigtfran']>$today) 
						{$kortstatus = "Ej börjat gälla";}

				else if ($row['aktivtkort'] == 0 || $row['giltigttill']<$today || $ag_aktivt==0) 
						{$kortstatus = "Ej aktivt";}

				if($ag_aktivt==0){		
				$allakort.= "<tr>" . "<td>" . $row['kortID'] . "</td>" . "<td>"  . $row['kort'] . "</td>" . "<td>" . $row["giltigtfran"] .  "</td>" . "<td>"  . $row["giltigttill"] . "</td>" . "<td>"  . $kortstatus .  "</td>". "</tr>" ;
	 			}

	 			else if($ag_aktivt==1) 
	 				{		
				$allakort.= "<tr>" . "<td>" . $row['kortID'] . "</td>" . "<td>"  . $row['kort'] . "</td>" . "<td>" . $row["giltigtfran"] .  "</td>" . "<td>"  . "Autogiro" . "</td>" . "<td>"  . $kortstatus .  "</td>". "</tr>" ;
	 			}
	 			$stmt->closeCursor(); 
 			}

	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}
				
	/*			if ($row['giltigtfran']>$today) 
						{$daysleft = "Inaktivt";}
					
				else 
						{$daysleft = ((strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400). " dagar kvar";}
*/

if($fryst==1){$daysleft="Fryst";}
else if ($giltigtfran > $today){$daysleft="Ej börjat gälla";}
else if (($korttyp=="AG12" || $korttyp=="AG12+2" || $korttyp=="AG24" || $korttyp=="AG24+2" || $korttyp=="AG12DAG") && $ag_aktivt ==1){ $daysleft="Autogiro";} 
else {$daysleft = ((strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400) . " dagar kvar"; }

$today = date("Y-m-d");  

     



	 try {
	 		$query = ("SELECT korttyp FROM korttyp WHERE kort = '{$kortet}'");
			$stmt = $db ->prepare($query);
			$stmt->execute();

			while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$korttypen = ($rows['korttyp']);
			}
			$stmt->closeCursor(); 


	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}


?>


