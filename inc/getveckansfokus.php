
    <?php
	 $veckansfokus_text ="";
	 $uppdaterad ="";
	

	 try {
			$results = $db -> query ("SELECT veckansfokus, uppdaterad FROM veckansfokus WHERE veckansfokusID =1 ");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$veckansfokus = ($results -> fetchAll(PDO::FETCH_ASSOC));


          foreach($veckansfokus as $v){

				 $veckansfokus_text .= $v['veckansfokus'];
				 $uppdaterad .= $v['uppdaterad'];

             }



?>

