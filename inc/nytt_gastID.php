
    <?php
$rows="";


		 try {
				$results = $db->query("SELECT gastID FROM gastlista");
		} 
		catch (Exception $e) {
				echo "Data could not be retrieved from the database";
				exit;
		}

		$rows = ($results -> fetchAll(PDO::FETCH_ASSOC));
		$kund="";
		foreach ($rows as $row) {
	   $kund = $row['gastID'];
		}


		$biggestgastid = $kund+1;
	

?>
