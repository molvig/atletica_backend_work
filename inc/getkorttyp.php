	<?php try {
			$results = $db -> query ("SELECT korttyp FROM medlemmar");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}


	$korttyp = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$kort = "";

	foreach ($korttyp as $k) {
		$kort .= "<option value='korttyp'>" . $k['korttyp'] . "</option>";
	}    
   

               ?>