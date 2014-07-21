

    <?php  $id_medlem = $_GET['pid'];
	 $kundnr ="";
	 $personnr ="";
	 $fnamn ="";
	 $enamn ="";
	 $telefon="";
	 $mail ="";
	 $kortdatum="";

	 try {
			$results = $db -> query ("SELECT kundnr, personnr, fnamn, enamn, telefon, kortdatum FROM medlemmar WHERE kundnr ={$id_medlem} ");
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
				 $kortdatum .=$m['kortdatum'];
             }


?>