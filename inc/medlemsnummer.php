	
	<?php try {
			$results = $db -> query ("SELECT MAX(kundnr) FROM medlemmar");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$results->execute();
	$array = $results -> fetchAll(PDO::FETCH_ASSOC);
	//$biggestkundnr = $array[0]+1;
	//echo $biggestkundnr;
echo $array;




