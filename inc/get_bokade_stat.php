<?php



	if(isset($_POST['inst-submit'])){
		
	    $instnamn = $_POST['instruktor'];

			try {
					$query = "SELECT * FROM bokningar, bokningsbara WHERE bokningsbara.bokningsbarID=bokningar.bokningsbarID AND bokningsbara.instnamn={$instnamn} order by datum asc";  
					
					$stmt = $db ->prepare($query);
					$stmt->execute();

					$antal = $stmt->rowCount(); 

					$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

					foreach ($result as $row) {

					$found .= "<tr>" . "<td>" .$row["datum"] . "</td>" . "<td>" . $row["passnamn"] .  "</td>" . "<td>"  . $row["instnamn"] . "</td>" . "<td>"  . $row["antalplatser"] .  "</td>" . "</tr>" ;
					}
		
				}
			 
			catch (Exception $e) { 

			 echo $e;
			 }
		
		}

	

?>