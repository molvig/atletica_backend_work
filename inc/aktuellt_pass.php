<?php

	if(isset($_GET["passid"])){
$passnamn ="";
 $passid = htmlspecialchars($_GET["passid"]);

try {
	$sql ="SELECT * FROM bokningsbara WHERE bokningsbarID = {$passid}";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetch(PDO::FETCH_ASSOC));
$results->closeCursor();

$passnamn = $sc['passnamn'];
$inst = $sc['instnamn'];
$antalplatser = $sc['antalplatser'];
$info = $sc['information'];
$datum = date('Y-m-d', strtotime($sc['datum']));
}

?>