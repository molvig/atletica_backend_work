<?php include ('db_con.php'); ?>
    <?php

$kundnr="";
$kund=0;
	 try {
			$results = $db -> query ("SELECT kundnr FROM medlemmar");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$kundnr = ($results -> fetch(PDO::FETCH_ASSOC));


          foreach($kundnr as $k){

				 $kund = $k['kundnr'];
				}

	
echo $kund;

?>


