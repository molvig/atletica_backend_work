	
	<?php try {
			$results = $db -> query ("SELECT * FROM passen");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}


	$passen = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$pass = "";

	foreach ($passen as $p) {
		$pass .= "<option value='passname'>" . $p['passname'] . "</option>";
	}    
   
