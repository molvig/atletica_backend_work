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
								 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, datum, gastID) VALUES (:kundnr, :bokningsbarID, :datum, :gastID)");
								    $q = $db -> prepare($query);
								    $q-> execute(array(':kundnr'=>$kundnr,
								    					':bokningsbarID'=>$passid,
								    					':datum'=>'2014-01-01 12:00:00',
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
							 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, passdatum,  gastID) VALUES (:kundnr, :bokningsbarID, :passdatum, :gastID)");
							    $q = $db -> prepare($query);
							    $q-> execute(array(':kundnr'=>$kundnr,
							    					':bokningsbarID'=>$passid,
							    					':passdatum'=>$passdatum,
							    					':gastID'=>null
							    ));

						  	if($query){
						  //   echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>';
							 echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
							}
						} 
						catch (Exception $e) {

						 echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';
						 echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";
						}
					
					}else {


							echo $fnamn. " ".$enamn. " kan bara vara bokad på ". $passantal. " st pass samtidigt!";
							echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";	
					}

				}else{ echo $fnamn. " ".$enamn. " har 3 skulder som måste lösas innan det går att göra en bokning";
						echo "<meta http-equiv=\"refresh\" content=\"2;URL='index.php?passid=".$passid."'\" />";}

			}








		}

		else {

			echo "<form method='post'>". "Det är fullt på detta passet! <br>" . "</form>";
		}  

	}
}

}


?>