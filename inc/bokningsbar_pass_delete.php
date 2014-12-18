<?php
if(isset($_GET["passid"]))
{
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