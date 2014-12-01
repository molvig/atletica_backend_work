<?php

	if(isset($_GET["passid"])){
	$passid = htmlspecialchars($_GET["passid"]);

try{
		$query = "SELECT * FROM bokningsbara, bokningar WHERE bokningsbara.bokningsbarID = {$passid} AND bokningar.bokningsbarID=bokningsbara.bokningsbarID";  
		$stmt = $db ->prepare($query);
		
		$stmt->execute();

		$antalbokade = $stmt->rowCount(); 

		$res = $stmt->fetch(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 
}

catch (Exception $e) { 

	echo $e;
	}

		$antalplatser = $res['antalplatser'];


echo "antalplatser:".$antalplatser . "<br>";
echo "bokade på passet".$antalbokade;


	 if(!empty($_POST['bokamedlem'])){

	if(isset($_POST['submit-medlem'])){
		
	    $kundnr = $_POST['bokamedlem'];


	    $bokningID = $passid;

	    if ($antalplatser > $antalbokade){

			try {
				 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID) VALUES (:kundnr, :bokningsbarID)");
				    $q = $db -> prepare($query);
				    $q-> execute(array(':kundnr'=>$kundnr,
				    					':bokningsbarID'=>$passid
				    ));

			  		if($query){?>
			    	<div class="grid_12"> <?php echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>'; ?></div>
				 <?php	}
			} 
			catch (Exception $e) { ?>

				<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in medlemmen... Försök igen!' . '</h4>';?> </div>
			<?php }
		
		}

		else {

			echo "<form method='post'>". "Det är fullt på detta passet! <br>". "<input type='submit'". "value='Boka en reservplats'>". "</form>";
		}  

	}
}

}


include('inc/get_bokade.php');
include('inc/get_veckans_pass.php');
?>