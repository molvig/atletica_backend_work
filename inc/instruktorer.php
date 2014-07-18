	<?php try {
			$results = $db -> query ("SELECT * FROM instruktorer");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}


	$instruktorer = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$instruktor = "";

	foreach ($instruktorer as $i) {
		$instruktor .= "<option value='instname'>" . $i['instname'] . "</option>";
	}    
   


	

   