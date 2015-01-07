<?php
	if(isset($_GET["passid"])){
$passid = htmlspecialchars($_GET["passid"]);
	 
	if(!empty($_POST['gastlista-submit'])){ 

		
	    $fnamn = $_POST['fnamn_gast'];
	    $enamn = $_POST['enamn_gast'];
	    $mail = $_POST['email_gast'];
	    $tel = $_POST['tel_gast'];
	    $bokningID = $passid;

		try {

		$query = "SELECT * FROM bokningsbara WHERE bokningsbara.bokningsbarID = {$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();		
		$result = ($stmt->fetch(PDO::FETCH_ASSOC)); 
	
		$passdatum = $result['datum'];
		$passnamn = $result['passnamn'];
		$starttid = date('H:i', strtotime($result['starttid']));
		
		$stmt->closeCursor(); 	
		}   
		catch (Exception $e) {

			 echo $e;
		}   


		try {
			$db->beginTransaction();

				$query = "INSERT INTO gastlista (gastID, fnamn, enamn, telefon, mail, bokningID, passdatum) VALUES (:gastid, :fnamn, :enamn,  :tel, :email, :bokningID, :passdatum)";
			    $q = $db -> prepare($query);
			    $q-> execute(array(':gastid'=>$biggestgastid,
			    					':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':tel'=>$tel,
			    					':email'=>$mail,
			    					':bokningID'=>$bokningID,
			    					':passdatum'=>$passdatum
			    					
			    ));


				$query ="INSERT INTO bokningar (kundnr, bokningsbarID, passdatum, gastID) VALUES (:kundnr, :bokningsbarID, :passdatum, :gastID)";
			    $q = $db -> prepare($query);
			    $q-> execute(array(':kundnr'=>null, 
			    					':bokningsbarID'=>$bokningID, 
			    					'passdatum'=>$passdatum,
			    					':gastID'=>$biggestgastid
			    					
			    ));



			    $db->commit();




		  		if($query){
		  		$to = $mail;
				$subject = $passnamn. " på Atletica";
				$txt = "
				<html>
				<head>
				<title>Gruppträning Atletica</title>
				</head>
				<body>
				<h4>Hej, ".$fnamn."!</h4>
				<p>Du är bokad på  ".$passnamn. " ". $passdatum. " som börjar kl ".$starttid." </p>
				<p>Var snäll och kom senast 10 minuter innan passet startar för att inte riskera att förlora din plats.</p>

				<h4>Avbokning</h4>
				<p>Om du skulle få förhinder och vill avboka din plats måste detta göras senast två timmar
				innan passet startar.</p>
				<p>Kontakta oss på telefon: 0340-14703</p>

				<h4>Välommen!<br>
				Hälsningar, Atletica <br>

				www.atletica.se
				</h4>
				</body>
				</html>
				" ;

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: Atletica <info@atletica.se>' . "\r\n";


				mail($to,$subject,$txt,$headers); 

		  			
		    	echo '<h4>' . 'Du har bokat '. '<strong>' . $fnamn  .'</strong>' .' som gäst!' . '</h4>';
			    echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />";	
		} 
		}
		catch (Exception $e) {

		 echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in gästen... Försök igen!' . '</h4>'; 
		 echo $e;
		}
			   

	}
	}
 
?>