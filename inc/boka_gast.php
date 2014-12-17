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

		$query = "SELECT datum FROM bokningsbara WHERE bokningsbara.bokningsbarID = {$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();		
		$result = ($stmt->fetch(PDO::FETCH_ASSOC)); 
	
		$passdatum = $result['datum'];
		
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


				$query ="INSERT INTO bokningar (kundnr, bokningsbarID, gastID) VALUES (:kundnr, :bokningsbarID, :gastID)";
			    $q = $db -> prepare($query);
			    $q-> execute(array(':kundnr'=>null, 
			    					':bokningsbarID'=>$bokningID, 
			    					':gastID'=>$biggestgastid
			    					
			    ));



			    $db->commit();




		  		if($query){

		  			//SKICKA EMAIL TILL GÄSTEN

		  			
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