    <?php
 $meddelande="";
 $meddelanden ="";
	

	 try {
			$results = $db -> query ("SELECT meddelande FROM medlemmar limit 1");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$meddelanden = ($results -> fetchAll(PDO::FETCH_ASSOC));


          foreach($meddelanden as $m){

				 $meddelande .= $m['meddelande'];

             }



?>