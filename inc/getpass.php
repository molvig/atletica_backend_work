    <?php



	 try {
			$results = $db -> query ("SELECT * FROM pass");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$passnamn = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$passnamnet ="";
	$pass = "";
          foreach($passnamn as $p){

				 $passnamnet .=  "<strong>" .$p['passnamn'] . "</strong>" . " " . $p['passbeskrivning'] . "<br />";
				 $pass .= "<option value='".$p['passnamn']."'>".$p['passnamn']."</option>";
				}

?>

