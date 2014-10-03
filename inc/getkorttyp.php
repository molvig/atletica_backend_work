	<?php try {
			$results = $db -> query ("SELECT kort, korttyp FROM korttyp ORDER BY korttyp DESC");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}


	$korttyp = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$kort = "";


	foreach ($korttyp as $k) {
		$kort .= "<option value=". $k['kort'] . ">" . $k['korttyp'] . "</option>";
		

	}    
   

               ?>