

 <?php 


if (isset($_POST['installda_alla'])) {
		$instfran = $_POST['instfran'];
		$insttill = $_POST['insttill'];


	try {
		$query = "SELECT * FROM bokningsbara WHERE installt=1 ORDER BY datum DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antal = $stmt->rowCount(); 
		  
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$found="";


		foreach( $result as $row ) {

		$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $row["installt_orsak"] . "</td>" . "</tr>" ;


		} 


		$stmt->closeCursor(); 

	}

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}



} 

else if (isset($_POST['installda_datum'])) {
		$instfran = $_POST['instfran'];
		$insttill = $_POST['insttill'];

		try {
		  $query = "SELECT * FROM bokningsbara WHERE datum >= '{$instfran}' AND datum <= '{$insttill}' AND installt=1 ORDER BY datum DESC";  
		  $stmt = $db ->prepare($query);

		$stmt->execute();

		$antal = $stmt->rowCount(); 
		  
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$found="";


		foreach( $result as $row ) {

		$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $row["installt_orsak"] . "</td>" . "</tr>" ;

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