

 <?php 


if (isset($_POST['gym-klipp'])) {
	try {
		$query = "SELECT * FROM klipplogg WHERE gym=1 ORDER BY klipptid DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antal = $stmt->rowCount(); 
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$found="";

		foreach( $result as $row ) {
		$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["klipptid"])). "</td>" ."<td>" .date('H:i', strtotime($row["klipptid"])). "</td>".  "<td>"  ." ".  "</td>" ."<td>" . "X"  .  "</td>" . "</tr>" ;
		} 
		$stmt->closeCursor(); 
	}
	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}
} 


if (isset($_POST['pass-klipp'])) {
	try {
		$query = "SELECT * FROM klipplogg WHERE pass=1 ORDER BY klipptid DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antal = $stmt->rowCount(); 
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$found="";
		$passnamn="";
		$stmt->closeCursor(); 
		foreach( $result as $row ) {
			$bokID=$row["bokningsbarID"];

			$query = "SELECT * FROM bokningsbara WHERE bokningsbarID={$bokID}";  
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$pass = $stmt->fetch(PDO::FETCH_ASSOC); 
			$passnamn=$pass['passnamn'];
			$stmt->closeCursor(); 

		$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["klipptid"])). "</td>" ."<td>" .date('H:i', strtotime($row["klipptid"])). "</td>".  "<td>"  .$passnamn.  "</td>" ."<td>" . ""  .  "</td>" . "</tr>" ;
		} 

	}
	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}



} 

if (isset($_POST['klipp-alla'])) {
	$klippfran = $_POST['klippfran'];
	$klipptill = $_POST['klipptill'];
	$klipptills = date('Y-m-d H:i:s', strtotime($klipptill. ' + 1 day'));
	try {
		$query = "SELECT * FROM klipplogg WHERE klipptid >= '{$klippfran}' AND klipptid <= '{$klipptills}' ORDER BY klipptid DESC";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$antal = $stmt->rowCount(); 
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		$found="";
		$passnamn="";
		$stmt->closeCursor(); 


		
		foreach($result as $row ) {

			if ($row['gym']==1){
			$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["klipptid"])). "</td>" ."<td>" .date('H:i', strtotime($row["klipptid"])). "</td>".  "<td>"  ." ".  "</td>" ."<td>" . "X"  .  "</td>" . "</tr>" ;
			} 
			else if  ($row['pass']==1){
				$bokID=$row["bokningsbarID"];

				$query = "SELECT * FROM bokningsbara WHERE bokningsbarID={$bokID}";  
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$pass = $stmt->fetch(PDO::FETCH_ASSOC); 
				$passnamn=$pass['passnamn'];
				$stmt->closeCursor(); 

				$found .= "<tr>" . "<td>" .date('Y-m-d', strtotime($row["klipptid"])). "</td>" ."<td>" .date('H:i', strtotime($row["klipptid"])). "</td>".  "<td>"  .$passnamn.  "</td>" ."<td>" . ""  .  "</td>" . "</tr>" ;
			} 
		}



	}	

	

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}



} 



?>