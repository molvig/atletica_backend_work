<?php



	if(isset($_POST['inst-submit'])){
		
		try {
	    $instnamn = $_POST['instruktor'];
	    $today=date('Y-m-d');
			
		$query = "SELECT * FROM bokningsbara WHERE instnamn='{$instnamn}' AND datum <= '{$today}' ORDER BY datum DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 
		$found="";
		$antalplatser="";
		$antalpass = $stmt->rowCount(); 

		foreach( $result as $row ) {
		$antalplatser= $row['antalplatser'];
		$passid= $row['bokningsbarID'];
		$query = "SELECT * FROM bokningar WHERE bokningsbarID={$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antalbokade = $stmt->rowCount(); 
		$hitta = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		
		$procent=$antalbokade / $row["antalplatser"] * 100;	
		$procent=round($procent, 2);	


			$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $antalbokade."/".$row["antalplatser"] . "</td>" . "<td>" . $procent ." %". "</td>" ."</tr>" ;
		} 


		$stmt->closeCursor(); 

		
		}
			 
			catch (Exception $e) { 

			 echo $e;
			 }
		
		}
	if(isset($_POST['pass-submit'])){
		
		try {
	    $passet = $_POST['pass'];
	    $today=date('Y-m-d');
			
		$query = "SELECT * FROM bokningsbara WHERE passnamn='{$passet}' AND datum <= '{$today}' ORDER BY datum DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 
		$found="";
		$antalplatser="";
		$antalpass = $stmt->rowCount(); 

		foreach( $result as $row ) {
		$antalplatser= $row['antalplatser'];
		$passid= $row['bokningsbarID'];
		$query = "SELECT * FROM bokningar WHERE bokningsbarID={$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antalbokade = $stmt->rowCount(); 
		$hitta = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		
		$procent=$antalbokade / $row["antalplatser"] * 100;	
		$procent=round($procent, 2);	


			$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $antalbokade."/".$row["antalplatser"] . "</td>" . "<td>" . $procent ." %". "</td>" ."</tr>" ;
		} 


		$stmt->closeCursor(); 

		
		}
			 
			catch (Exception $e) { 

			 echo $e;
			 }
		
		}
	


	if(isset($_POST['date-submit'])){
		
		try {
	    $till = $_POST['bokadetill'];
	    $fran = $_POST['bokadefran'];
echo $till;
echo $fran;
	    $today=date('Y-m-d');
			
		$query = "SELECT * FROM bokningsbara WHERE datum <= '{$till}' AND datum >= '{$fran}' ORDER BY datum DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$stmt->closeCursor(); 
		$antalpass = $stmt->rowCount(); 
		$found="";
		$antalplatser="";


		foreach( $result as $row ) {
		$antalplatser= $row['antalplatser'];
		$passid= $row['bokningsbarID'];
		$query = "SELECT * FROM bokningar WHERE bokningsbarID={$passid}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antalbokade = $stmt->rowCount(); 
		$hitta = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		
		$procent=$antalbokade / $row["antalplatser"] * 100;	
		$procent=round($procent, 2);	


			$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["datum"])) . "</a>" . "</td>" . "<td>" . $row["passnamn"]  .  "</td>" . "<td>" . $row["instnamn"] . "</td>" . "<td>" . $antalbokade."/".$row["antalplatser"] . "</td>" . "<td>" . $procent ." %". "</td>" ."</tr>" ;
		} 


		$stmt->closeCursor(); 

		
		}
			 
			catch (Exception $e) { 

			 echo $e;
			 }
		
		}	

?>