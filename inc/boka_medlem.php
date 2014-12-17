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

						try {
							 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, gastID) VALUES (:kundnr, :bokningsbarID, :gastID)");
							    $q = $db -> prepare($query);
							    $q-> execute(array(':kundnr'=>$kundnr,
							    					':bokningsbarID'=>$passid,
							    					':gastID'=>null
							    ));

						  		if($query){
						  //   echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>';
							 echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
							}
						} 
						catch (Exception $e) {

						 echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';
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