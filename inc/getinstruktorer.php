    <?php
	 $instnamn ="";


	 try {
			$results = $db -> query ("SELECT instnamn FROM instruktorer");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$instnamn = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$instnamnet ="";
          foreach($instnamn as $i){

				 $instnamnet .= $i['instnamn']. "<br>";
				}

?>

