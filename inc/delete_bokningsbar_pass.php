<?php
if(isset($_GET["passid"]))
{
	try{
	//plocka fram info för att ta bort från schemat	
		$info = "SELECT passnamn, instnamn 
				from bokningsbara where bokningsbarID = :pid";

		$results = $db -> prepare ($info);
		$results->execute(array(':pid' => $_GET["passid"]));

		$passInfo = ($results -> fetch(PDO::FETCH_ASSOC));
		$results->closeCursor();

		$namn = $passInfo["passnamn"];	
		$inst = $passInfo["instnamn"];

		$veckoDag = $_GET["datum"];
		
	}

	catch(Exception $e){

	}	
	//schema.php?schemaid=4&date=05-01-2015

	$back = "<a href='schema.php?schemaid=". $_SESSION["schemaId"] . "&date=".$_SESSION["schemaDatum"]. "'>Tillbaka till schemat</a>";
	try{
			$DelFromSchema = "DELETE from schemat where bokningsbarID = :bid;";

			$results = $db -> prepare ($DelFromSchema);
			$results->execute(array(':bid' => $_GET["passid"]));
			$results->closeCursor();
	}
	catch(Exeption $e){

	}
	try{
			$DelFromBokningsbara = "DELETE from bokningsbara where bokningsbarID = :pid;";

			$results = $db -> prepare ($DelFromBokningsbara);
			$results->execute(array(':pid' => $_GET["passid"]));
			
			$results->closeCursor();
	}
	catch(Exeption $e){

	}
}



?>