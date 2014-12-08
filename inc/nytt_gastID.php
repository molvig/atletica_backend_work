
    <?php

		try {
		$query=("SELECT gastID FROM gastlista ORDER BY gastID DESC LIMIT 1");
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antalbokade = $stmt->rowCount(); 
		$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
		$stmt->closeCursor(); 
			
		foreach ($result as $row) {
	   	$gast = $row['gastID'];
		}

		$biggestgastid = $gast+1;
		} 

		catch (Exception $e) {
				echo "Data could not be retrieved from the database";
				exit;
		}
?>
