	<?php
	if(isset($_GET["passid"])){
$passid = htmlspecialchars($_GET["passid"]);
	try {
		$query = "SELECT * FROM bokningar, medlemmar WHERE bokningsbarID = {$passid} AND bokningar.kundnr=medlemmar.kundnr";  
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antal = $stmt->rowCount(); 
		  
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		$found="";

foreach ($result as $row) {


$found .= "<tr>" . "<td>" . "<a href='medlem_uppdatera.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>" . $row["enamn"] . "</td>" . "<td>"  . date('Y-m-d', strtotime($row["medlemsstart"])). "</td>" . "</tr>" ;
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