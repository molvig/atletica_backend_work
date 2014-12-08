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

			try {
				 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID, gastID) VALUES (:kundnr, :bokningsbarID, :gastID)");
				    $q = $db -> prepare($query);
				    $q-> execute(array(':kundnr'=>$kundnr,
				    					':bokningsbarID'=>$passid,
				    					':gastID'=>null
				    ));

			  		if($query){?>
			    	<div class="grid_12"> <?php echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>'; ?></div>
				 <?php	         echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />";	
				}
			} 
			catch (Exception $e) { ?>

				<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';?> </div>
			<?php }
		
		}

		else {

			echo "<form method='post'>". "Det är fullt på detta passet! <br>" . "</form>";
		}  

	}
}

}


?>