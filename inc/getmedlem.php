

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
	 $giltigt="";
	 $korttypen="";
	 $fryst="";
	 $frysdatum="";
	 $nyckelkort="";


	 try {
			$results = $db -> query ("SELECT kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, meddelande, medlemsstart, passantal  FROM medlemmar WHERE kundnr ={$id_medlem} ");
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
             }




	 try {
			$results = $db -> query ("SELECT kortID, kort, giltigt, nyckelkort, fryst, frysdatum FROM medlemskort WHERE kundnr ={$kundnr} ");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$kort = ($results -> fetchAll(PDO::FETCH_ASSOC));

          foreach($kort as $k){

				$kortID .= $k['kortID'];
				$kortet .= $k['kort'];
				$giltigt .= $k['giltigt'];
				$nyckelkort .= $k['nyckelkort'];
				$fryst .= $k['fryst'];
				$frysdatum .= $k['frysdatum'];

             }



$today = date("Y-m-d");  
$daysleft = (strtotime("$giltigt 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400; 
     



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



