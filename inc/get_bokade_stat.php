<?php



	if(isset($_POST['inst-submit'])){
		
		try {
	    $instnamn = $_POST['instruktor'];

			
		$query = "SELECT * FROM bokningsbara WHERE instnamn='{$instnamn}' ORDER BY datum, passnamn DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 
		$found="";


		foreach( $result as $row ) {
		$query = "SELECT * FROM bokningar WHERE bokningsbarID={$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antalbokade = $stmt->rowCount(); 
		$hitta = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$antalplatser= $hitta['antalplatser'];
		$passid= $row['bokningsbarID'];


			$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $row["antalplatser"] . "</td>" . "</tr>" ;
		} 


		$stmt->closeCursor(); 

		
		}
			 
			catch (Exception $e) { 

			 echo $e;
			 }
		
		}

	

?>