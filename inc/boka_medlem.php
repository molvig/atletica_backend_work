<?php

	if(isset($_GET["passid"])){
	$passid = htmlspecialchars($_GET["passid"]);

try{
		$query = "SELECT * FROM bokningsbara, bokningar WHERE bokningsbara.bokningsbarID = {$passid} AND bokningar.bokningsbarID=bokningsbara.bokningsbarID";  
		$stmt = $db ->prepare($query);
		
		$stmt->execute();

		$res = $stmt->fetch(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 

		
}

catch (Exception $e) { 

	echo $e;
}


	 if(!empty($_POST['bokamedlem'])){

	if(isset($_POST['submit-medlem'])){
		
	    $kundnr = $_POST['bokamedlem'];


	    $bokningID = $passid;

	    if ($antalplatserna > $antalbokade){


			if ($kundnr==1){

							try {
								 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, datum, incheckad, gastID) VALUES (:kundnr, :bokningsbarID, :datum, :incheckad, :gastID)");
								    $q = $db -> prepare($query);
								    $q-> execute(array(':kundnr'=>$kundnr,
								    					':bokningsbarID'=>$passid,
								    					':datum'=>'2014-01-01 12:00:00',
								    					':incheckad'=>1,
								    					':gastID'=>null
								    ));

							  		if($query){
							    	echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>';
								 echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
								}
							} 
							catch (Exception $e) { 

							echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';
							echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />"; }


				}

			else {

				$today = date('Y-m-d');
				$now= date('Y-m-d H:i:s');
				$sixdays = date('Y-m-d', strtotime($today. "+ 6 days"));

							$query = "SELECT * FROM medlemmar WHERE kundnr= {$kundnr}";  
							$stmt = $db ->prepare($query);
							$stmt->execute();
							$pass = $stmt->fetch(PDO::FETCH_ASSOC); 
							$stmt->closeCursor(); 
							$passantal = $pass['passantal'];
							$fnamn = $pass['fnamn'];
							$enamn = $pass['enamn'];
							$stmt->closeCursor(); 
							$medlem = $stmt->rowCount(); 
			if ($medlem==0)	{
				$ingen = '<script> alert("'. "Det finns ingen som har medlemsnummer: ".$kundnr .'");</script>';
				echo $ingen;
				echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";

			}else {			

							$query = "SELECT * FROM bokningar WHERE kundnr= {$kundnr} AND passdatum <= '{$sixdays}' AND passdatum >= '{$today}' "; 
							$stmt = $db ->prepare($query);
							$stmt->execute();
							$bokningar = $stmt->rowCount();
							$stmt->closeCursor(); 

							$query = "SELECT * FROM skulder WHERE kundnr= {$kundnr}"; 
							$stmt = $db ->prepare($query);
							$stmt->execute();
							$skulder = $stmt->rowCount();
							$stmt->closeCursor(); 

						if ($skulder < 3){

					if ($bokningar < $passantal){
						try {
							 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, passdatum, datum, gastID) VALUES (:kundnr, :bokningsbarID, :passdatum, :datum, :gastID)");
							    $q = $db -> prepare($query);
							    $q-> execute(array(':kundnr'=>$kundnr,
							    					':bokningsbarID'=>$passid,
							    					':datum'=>$now,
							    					':passdatum'=>$passdatum,
							    					':gastID'=>null
							    ));

						  	if($query){
						  //   echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>';
							 echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
							}
						} 
						catch (Exception $e) {

							$bok = '<script> alert("'. $fnamn. " ".$enamn. " är redan bokad på detta passet!" .'");</script>';
							echo $bok;
						 echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";
						}
					
					}else {

							$max = '<script> alert("'. $fnamn. " ".$enamn. " kan bara vara bokad på ". $passantal. " st pass samtidigt!" .'");</script>';
							echo $max;
							echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";	
					}

				}else{ 
							$skul = '<script> alert("'. $fnamn. " ".$enamn. " har ".$skulder. " skulder som måste lösas innan det går att göra en bokning". '");</script>';
							echo $skul;
						echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";}

			}





}

 
		}

		else {
						if ($kundnr==1){

							try {
								 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, datum, incheckad, gastID) VALUES (:kundnr, :bokningsbarID, :datum, :incheckad, :gastID)");
								    $q = $db -> prepare($query);
								    $q-> execute(array(':kundnr'=>$kundnr,
								    					':bokningsbarID'=>$passid,
								    					':datum'=>'2014-01-01 12:00:00',
								    					':incheckad'=>1,
								    					':gastID'=>null
								    ));

							  		if($query){
							    	echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>';
								 echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
								}
							} 
							catch (Exception $e) { 

							echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';
							echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />"; }


				}
				else{

						$fullt = '<script> alert("'. "Detta passet är fullt!". '");</script>';
						echo $fullt;
			}
		}  

	}

}

}


?>