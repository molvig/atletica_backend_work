<?php
	try{
			$getActivePeriod = $db->query('SELECT * FROM schematyp WHERE CURDATE() >= startdatum AND CURDATE() <= slutdatum');
	}
	catch(Exception $e){
			echo "Data could not be retrieved from the database";
			exit;
	}
	
	$active = ($getActivePeriod -> fetch(PDO::FETCH_ASSOC));
	$getActivePeriod->closeCursor();
if($active["aktivt"] == 0)
{
	try{
			$updateAktiveVar = 'UPDATE schematyp as s set s.aktivt = 1 where s.schematyp = :typ';
	}
	catch(Exception $e){
			echo "Data could not be retrieved from the database";
			exit;
	}
	
	$results = $db -> prepare ($updateAktiveVar);
	$results->execute(array(':typ' => $active["schematyp"]));			
	$results->closeCursor();
}
?>