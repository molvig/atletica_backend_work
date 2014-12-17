<?php
if(isset($_GET["passid"]))
{
	try{
	//plocka fram info för att ta bort från schemat	
	$info = "SELECT passnamn, instnamn, TIME_FORMAT(starttid, '%H:%i'), TIME_FORMAT(sluttid, '%H:%i') 
			from bokningsbara where bokningsbarID = :pid";

	$results = $db -> prepare ($info);
	$results->execute(array(':pid' => $_GET["passid"]));

	$passInfo = ($results -> fetch(PDO::FETCH_ASSOC));
	$results->closeCursor();

	$namn = $passInfo["passnamn"];
	$starttid = $passInfo["starttid"];
	$sluttid = $passInfo["sluttid"];
	$inst = $passInfo["instnamn"];
	}
	catch(Exception $e){

	}	

	try{
	//plocka fram info för att ta bort från schemat	
	$start = "SELECT * 
			from bokningsbara as b, schemat as s
			where passnamn = (select passnamn from bokningsbara as bInner where bInner.bokningsbarID = :pid)
			and instnamn = (select instnamn from bokningsbara as bInner where bInner.bokningsbarID = :pid)
			and schematyp = :sid
			and b.bokningsbarID = s.bokningsbarID
			and datum > (CURDATE() + INTERVAL 6 DAY)";

	$results = $db -> prepare ($start);
	$results->execute(array(':pid' => $_GET["passid"],
							':sid' => $_GET["schemaid"]));

	}
	catch(Exception $e){

	}

	$bID = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$results->closeCursor();

	try{
	//ta bort från schemat
		foreach ($bID as $p) {
			$DelFromSchema = "DELETE from schemat where bokningsbarID = :bid;";

			$results = $db -> prepare ($DelFromSchema);
			$results->execute(array(':bid' => $p["bokningsbarID"]));
			$results->closeCursor();
		}	

	}
	catch(Exception $e){

	}		
	
	try{
		foreach ($bID as $p) {
			//Ta bort från bokningsbara
			$DelFromBokningsbara = "DELETE from bokningsbara where bokningsbarID = :pid;";

			$results = $db -> prepare ($DelFromBokningsbara);
			$results->execute(array(':pid' => $p["bokningsbarID"]));
			
			$results->closeCursor();
		}
	}
	catch(Exception $e){

	}	
}
?>