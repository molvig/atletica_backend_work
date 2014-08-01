





    <?php



	 try {
			$results = $db -> query ("SELECT kundnr FROM medlemmar ORDER BY kundnr DESC LIMIT 1;");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$kundnr = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$kundnret ="";
	
          foreach($kundnr as $k){

				 $kundnret .= $k['kundnr'];

				}

?>
