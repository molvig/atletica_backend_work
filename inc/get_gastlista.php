

 <?php 


if (isset($_POST['gastlista_alla'])) {
		$gastfran = $_POST['gastfran'];
		$gasttill = $_POST['gasttill'];


	try {
		$query = "SELECT * FROM gastlista ORDER BY passdatum DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antal = $stmt->rowCount(); 
		  
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$found="";


		foreach( $result as $row ) {

		$found .= "<tr>" . "<td>" . $row["fnamn"] . "</a>" . "</td>" . "<td>" . $row["enamn"] .  "</td>" . "<td>" . $row["telefon"] . "</td>" . "<td>" . $row["mail"] . "</td>" . "<td>"  . $row["passdatum"] . "</td>" . "</tr>" ;

		} 


		$stmt->closeCursor(); 

	}

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}



} 

else if (isset($_POST['gastlista_datum'])) {
			$gastfran = $_POST['gastfran'];
		$gasttill = $_POST['gasttill'];

		try {
		  $query = "SELECT * FROM gastlista WHERE passdatum >= '{$gastfran}' AND passdatum <= '{$gasttill}' ORDER BY passdatum DESC";  
		  $stmt = $db ->prepare($query);

		$stmt->execute();

		$antal = $stmt->rowCount(); 
		  
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$found="";


		foreach( $result as $row ) {

		$found .= "<tr>" . "<td>" . $row["fnamn"] . "</a>" . "</td>" . "<td>" . $row["enamn"] .  "</td>" . "<td>" . $row["telefon"] . "</td>" . "<td>" . $row["mail"] . "</td>" . "<td>"  . $row["passdatum"] . "</td>" . "</tr>" ;

		} 


		$stmt->closeCursor(); 

	}

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}



} 


?>